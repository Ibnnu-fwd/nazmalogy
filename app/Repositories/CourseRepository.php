<?php

namespace App\Repositories;

use App\Interfaces\CourseInterface;
use App\Interfaces\TransactionInterface;
use App\Models\Course;
use App\Models\CourseLastTask;
use App\Models\Submission;
use App\Models\Transaction;
use App\Models\UserCourseChapterLog;
use App\Models\UserQuizLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class CourseRepository implements CourseInterface
{
    private $course;
    private $userCourseChapterLog;
    private $transaction;
    private $userQuizLog;
    private $courseLastTask;
    private $submission;

    public function __construct(Course $course, UserCourseChapterLog $userCourseChapterLog, TransactionInterface $transaction, UserQuizLog $userQuizLog, CourseLastTask $courseLastTask, Submission $submission)
    {
        $this->course               = $course;
        $this->userCourseChapterLog = $userCourseChapterLog;
        $this->transaction          = $transaction;
        $this->userQuizLog          = $userQuizLog;
        $this->courseLastTask       = $courseLastTask;
        $this->submission           = $submission;
    }

    public function getAll()
    {
        $courses = $this->course->with('courseCategory')->get();
        // check if user has bought the course
        if (auth()->check()) {
            $courses->map(function ($course) {
                $course->is_bought = Transaction::query()
                    ->where('user_id', auth()->user()->id)
                    ->where('course_id', $course->id)
                    ->where('status', Transaction::STATUS_CONFIRM)
                    ->exists();
            });
        }

        return $courses;
    }

    public function getById($id)
    {
        $course = $this->course
            ->with(['courseCategory', 'playlists.chapters.reviews', 'playlists.quiz'])
            ->findOrFail($id);

        $course->lesson_count = $this->calculateLessonCount($course->playlists);
        $course->review_count = $this->calculateReviewCount($course->playlists);
        $course->quiz_count   = $this->calculateQuizCount($course->playlists);
        $course->duration     = $this->calculateTotalDuration($course->playlists);
        $course->reviews      = $this->getSortedReviews($course->playlists);
        $course->total_rating = $course->reviews->avg('rating');

        return $course;
    }

    private function calculateLessonCount($playlists)
    {
        return $playlists->flatMap(fn ($playlist) => $playlist->chapters)->count();
    }

    private function calculateReviewCount($playlists)
    {
        return $playlists->flatMap(fn ($playlist) => $playlist->chapters->flatMap(fn ($chapter) => $chapter->reviews))->count();
    }

    private function calculateQuizCount($playlists)
    {
        return $playlists->filter(fn ($playlist) => $playlist->quiz !== null)->count();
    }

    private function calculateTotalDuration($playlists)
    {
        $totalDurationMinutes = $playlists->flatMap(fn ($playlist) => $playlist->chapters)->sum('duration');
        return Carbon::parse($totalDurationMinutes)->locale('id')->isoFormat('H [Jam] m [Menit]');
    }

    private function getSortedReviews($playlists)
    {
        return $playlists->flatMap(fn ($playlist) => $playlist->chapters)
            ->flatMap(fn ($chapter) => $chapter->reviews)
            ->sortByDesc('created_at');
    }

    public function store($data)
    {
        try {
            if (isset($data['thumbnail'])) {
                $thumbnailFileName = uniqid() . '.' . $data['thumbnail']->extension();
                $data['thumbnail']->storeAs('public/courses', $thumbnailFileName);
                $data['thumbnail'] = $thumbnailFileName;

                chmod(storage_path('app/public/courses/' . $thumbnailFileName), 0755);
            }

            $data['author_id'] = auth()->user()->id;
            return $this->course->create($data);
        } catch (\Throwable $th) {
            Storage::delete('public/courses/' . $thumbnailFileName);
            throw $th;
        }
    }

    public function update($id, $data)
    {
        try {
            $course = $this->course->findOrFail($id);

            if (isset($data['thumbnail'])) {
                $thumbnailFileName = uniqid() . '.' . $data['thumbnail']->extension();
                $data['thumbnail']->storeAs('public/courses', $thumbnailFileName);
                $data['thumbnail'] = $thumbnailFileName;
            }

            $data['author_id'] = auth()->user()->id;
            $course->update($data);

            return $course;
        } catch (\Throwable $th) {
            Storage::delete('public/courses/' . $thumbnailFileName);
            throw $th;
        }
    }

    public function destroy($id)
    {
        return $this->course->where('id', $id)->update(['publish_status' => false]);
    }

    public function recover($id)
    {
        return $this->course->where('id', $id)->update(['is_active' => true]);
    }

    public function getUserProgress($courseId, $userId)
    {
        $course = $this->course->findOrFail($courseId);
        foreach ($course->playlists as $playlist) {
            $playlist->chapters->map(function ($chapter) use ($userId) {
                $chapter->is_finished = $this->userCourseChapterLog
                    ->where('user_id', $userId)
                    ->where('course_chapter_id', $chapter->id)
                    ->exists();
            });
        }
        // last task
        $playlist->last_task = $this->userCourseChapterLog
            ->where('user_id', $userId)
            ->where('course_chapter_id', $playlist->chapters->last()->id)
            ->first();

        return $course;
    }

    public function getAllProgress($userId)
    {
        $transaction = $this->transaction->getByUserId($userId)->where('status', 'confirm');
        $courses     = $transaction->map(function ($item) {
            return $item->course;
        });

        foreach ($courses as $course) {
            foreach ($course->playlists as $playlist) {
                $playlist->chapters->map(function ($chapter) use ($userId) {
                    $chapter->is_finished = $this->userCourseChapterLog
                        ->where('user_id', $userId)
                        ->where('course_chapter_id', $chapter->id)
                        ->exists();
                });

                // quiz
                if ($playlist->quiz !== null) {
                    $playlist->quiz->is_finished = $this->userQuizLog
                        ->where('user_id', $userId)
                        ->where('quiz_id', $playlist->quiz->id)
                        ->exists();
                }
            }

            $course->progressPercentage = $this->calculateProgressPercentage($course->playlists);
            $course->last_tasks         = $this->courseLastTask->where('course_id', $course->id)->get();

            // last task
            $course->all_last_task_finished = false;
            foreach ($course->last_tasks as $last_task) {
                $last_task->is_finished = $this->submission
                    ->where('user_id', $userId)
                    ->where('course_id', $course->id)
                    ->where('status', Submission::APPROVED_STATUS)
                    ->where('course_last_task_id', $last_task->id)
                    ->exists();

                if ($last_task->is_finished == false) {
                    $course->all_last_task_finished = false;
                    break;
                } else {
                    $course->all_last_task_finished = true;
                }
            }
        }

        return $courses;
    }

    private function calculateProgressPercentage($playlists)
    {
        $totalChapter         = $playlists->flatMap(fn ($playlist) => $playlist->chapters)->count();
        $totalFinishedChapter = $playlists->flatMap(fn ($playlist) => $playlist->chapters)->filter(fn ($chapter) => $chapter->is_finished)->count();
        $totalQuiz            = $playlists->filter(fn ($playlist) => $playlist->quiz !== null)->count();
        $totalFinishedQuiz    = $playlists->filter(fn ($playlist) => $playlist->quiz !== null)->filter(fn ($playlist) => $playlist->quiz->is_finished)->count();

        $totalFinished = $totalFinishedChapter + $totalFinishedQuiz;
        $total         = $totalChapter + $totalQuiz;

        return $totalFinished / $total * 100;
    }

    public function getCourseByAuthorId($authorId)
    {
        return $this->course->where('author_id', $authorId)->get();
    }

    public function getByCategories($categories)
    {
        return $this->course->whereIn('course_category_id', $categories)->get();
    }

    public function filter()
    {
        $courses = $this->course->query()
            ->when(request()->filled('categories'), function ($query) {
                $query->whereIn('course_category_id', request()->categories);
            })
            ->when(request()->filled('type'), function ($query) {
                $query->where('price', request()->type == 'free' ? 0 : '>', 0);
            })
            ->when(request()->filled('range'), function ($query) {
                // exp  = cheap -> expensive
                // price = expensive -> cheap
                $query->orderBy('price', request()->range == 'exp' ? 'desc' : 'asc'); // Corrected order
            })
            ->get(); // Use get() to execute the query and retrieve the results.

        return $courses;
    }
}

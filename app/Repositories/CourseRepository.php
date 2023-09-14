<?php

namespace App\Repositories;

use App\Interfaces\CourseInterface;
use App\Interfaces\TransactionInterface;
use App\Models\Course;
use App\Models\UserCourseChapterLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class CourseRepository implements CourseInterface
{
    private $course;
    private $userCourseChapterLog;
    private $transaction;

    public function __construct(Course $course, UserCourseChapterLog $userCourseChapterLog, TransactionInterface $transaction)
    {
        $this->course = $course;
        $this->userCourseChapterLog = $userCourseChapterLog;
        $this->transaction = $transaction;
    }

    public function getAll()
    {
        return $this->course->with('courseCategory')->get();
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
        return $this->course->where('id', $id)->update(['is_active' => false]);
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

        return $course;
    }

    public function getAllProgress($userId)
    {
        $transaction = $this->transaction->getByUserId($userId);
        $courses = $transaction->map(function ($item) {
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

                $course->progressPercentage = $this->calculateProgressPercentage($playlist->chapters);
            }
        }

        return $courses;
    }

    private function calculateProgressPercentage($chapters)
    {
        $totalChapter = $chapters->count();
        $finishedChapter = $chapters->filter(fn ($chapter) => $chapter->is_finished)->count();

        return $totalChapter > 0 ? round($finishedChapter / $totalChapter * 100) : 0;
    }
}

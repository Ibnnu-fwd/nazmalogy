<?php

namespace App\Repositories;

use App\Interfaces\LearningInterface;
use App\Models\Course;
use App\Models\CourseChapter;
use App\Models\Transaction;
use App\Models\UserCourseChapterLog;
use App\Models\UserQuizLog;
use Carbon\Carbon;

class LearningRepository implements LearningInterface
{
    private $course;
    private $userCourseChapterLog;
    private $transaction;
    private $userQuizLog;
    private $courseChapter;

    public function __construct(Course $course, UserCourseChapterLog $userCourseChapterLog, Transaction $transaction, UserQuizLog $userQuizLog, CourseChapter $courseChapter)
    {
        $this->course               = $course;
        $this->userCourseChapterLog = $userCourseChapterLog;
        $this->transaction          = $transaction;
        $this->userQuizLog          = $userQuizLog;
        $this->courseChapter        = $courseChapter;
    }

    public function getByCourseId($course_id)
    {
        $userId = auth()->user()->id;
        $course = $this->transaction->where('user_id', $userId)->where('course_id', $course_id)->first()->course->load('playlists.chapters', 'playlists.quiz');
        // dd($course);
        foreach ($course->playlists as $playlist) {
            $playlist->chapters->map(function ($chapter) use ($userId) {
                $chapter->is_finished = $this->userCourseChapterLog
                    ->where('user_id', $userId)
                    ->where('course_chapter_id', $chapter->id)
                    ->exists();
            });

            if ($playlist->quiz !== null) {
                $playlist->quiz->is_finished = $this->userQuizLog
                    ->where('user_id', $userId)
                    ->where('quiz_id', $playlist->quiz->id)
                    ->exists();
            }

            $course->progressPercentage = $this->calculateProgressPercentage($playlist->chapters);
            $course->lesson_count       = $this->calculateLessonCount($course->playlists);
        }

        // dd($course->playlists);
        return $course;
    }

    private function calculateLessonCount($playlists)
    {
        return $playlists->flatMap(fn ($playlist) => $playlist->chapters)->count();
    }

    private function calculateProgressPercentage($chapters)
    {
        $totalChapter    = $chapters->count();
        $finishedChapter = $chapters->filter(fn ($chapter) => $chapter->is_finished)->count();

        return $totalChapter > 0 ? round($finishedChapter / $totalChapter * 100) : 0;
    }

    public function getByChapterId($chapter_id)
    {
        $chapter = $this->courseChapter->where('id', $chapter_id)->first();
        $course  = $chapter->playlist->course->load('playlists.chapters', 'playlists.quiz');

        return [
            'course'  => $course,
            'chapter' => $chapter,
        ];
    }
}

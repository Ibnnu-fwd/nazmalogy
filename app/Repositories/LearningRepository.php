<?php

namespace App\Repositories;

use App\Interfaces\LearningInterface;
use App\Interfaces\QuestionInterface;
use App\Models\Course;
use App\Models\CourseChapter;
use App\Models\Playlist;
use App\Models\Quiz;
use App\Models\Transaction;
use App\Models\UserCourseChapterLog;
use App\Models\UserQuizLog;

class LearningRepository implements LearningInterface
{
    private $course;
    private $userCourseChapterLog;
    private $transaction;
    private $userQuizLog;
    private $courseChapter;
    private $question;
    private $playlist;

    public function __construct(Course $course, UserCourseChapterLog $userCourseChapterLog, Transaction $transaction, UserQuizLog $userQuizLog, CourseChapter $courseChapter, QuestionInterface $question, Playlist $playlist)
    {
        $this->course               = $course;
        $this->userCourseChapterLog = $userCourseChapterLog;
        $this->transaction          = $transaction;
        $this->userQuizLog          = $userQuizLog;
        $this->courseChapter        = $courseChapter;
        $this->question             = $question;
        $this->playlist             = $playlist;
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
        $course = $this->course
            ->with(['playlists', 'playlists.chapters', 'playlists.quiz'])
            ->whereHas('playlists.chapters', function ($query) use ($chapter_id) {
                $query->where('id', $chapter_id);
            })
            ->first();

        $userId = auth()->user()->id;

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

        $chapter = $this->courseChapter->find($chapter_id);


        return [
            'course'  => $course,
            'chapter' => $chapter,
        ];
    }

    public function getNextChapter($playlist_id, $chapter_id)
    {
        // Check if there is a next chapter in the playlist
        $nextChapter = $this->courseChapter
            ->where('playlist_id', $playlist_id)
            ->where('id', '>', $chapter_id)
            ->first();

        if ($nextChapter) {
            return $nextChapter;
        }

        // If there is no next chapter, check if there's a quiz in the playlist
        $playlist = $this->playlist->where('id', $playlist_id)->first();

        if ($playlist->quiz) {
            return [
                'type'        => 'quiz',
                'quiz_id'     => $playlist->quiz->id,
                'playlist_id' => $playlist_id,
            ];
        }

        return null;
    }

    public function getByQuizId($playlist_id, $quiz_id)
    {
        $course = $this->course
            ->with(['playlists', 'playlists.chapters', 'playlists.quiz', 'playlists.quiz.questions'])
            ->whereHas('playlists.quiz', function ($query) use ($quiz_id) {
                $query->where('id', $quiz_id);
            })
            ->first();

        $userId = auth()->user()->id;

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

        $quiz = Quiz::with('questions')->find($quiz_id);

        return [
            'course' => $course,
            'quiz'   => $quiz,
        ];
    }

    public function answerQuiz($quiz_id, $data)
    {
        $correctAnswer   = 0;
        $incorect_answer = [];
        $questions       = $this->question->getByQuizId($quiz_id);
        foreach ($data as $question_id => $answer_id) {
            $question       = last(explode('_', $question_id));
            $correctAnswer += $questions->where('id', $question)->where('answer', $answer_id)->count();
            if ($questions->where('id', $question)->where('answer', $answer_id)->count() == 0) {
                $incorect_answer[] = $question;
            }
        }

        $userQuizLog = $this->userQuizLog->where('user_id', auth()->user()->id)->where('quiz_id', $quiz_id)->first();

        if ($userQuizLog) {
            $userQuizLog->update([
                'correct_answers' => $correctAnswer,
                'finished_at'     => now(),
            ]);
        } else {
            $this->userQuizLog->create([
                'user_id'         => auth()->user()->id,
                'quiz_id'         => $quiz_id,
                'correct_answers' => $correctAnswer,
                'finished_at'     => now(),
            ]);
        }

        return [
            'correct_answer'   => $correctAnswer,
            'incorrect_answer' => $incorect_answer,
            'total_question'   => count($data),
            'is_passed'        => $correctAnswer == count($data) ? true : false,
        ];
    }

    public function getNextPlaylist($playlist_id)
    {
        $nextPlaylist = $this->playlist->where('id', '>', $playlist_id)->first();

        if ($nextPlaylist == null) {
            return null;
        }

        $nextChapter = $nextPlaylist->chapters->first();

        if ($nextChapter) {
            return [
                'type'        => 'chapter',
                'chapter_id'  => $nextChapter->id,
                'playlist_id' => $nextPlaylist->id,
            ];
        }

        return null;
    }
}

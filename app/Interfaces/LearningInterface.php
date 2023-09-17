<?php

namespace App\Interfaces;

interface LearningInterface
{
    public function getByCourseId($course_id);
    public function getByChapterId($chapter_id);
    public function getNextChapter($playlist_id, $chapter_id);
    public function getByQuizId($playlist_id, $quiz_id);
    public function answerQuiz($quiz_id, $data);
    public function getNextPlaylist($playlist_id);
}

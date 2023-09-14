<?php

namespace App\Interfaces;

interface LearningInterface
{
    public function getByCourseId($course_id);
    public function getByChapterId($chapter_id);
}

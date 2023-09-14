<?php

namespace App\Interfaces;

interface CourseChapterReviewInterface
{
    public function getAll();
    public function getByCourseChapterId($course_chapter_id);
}

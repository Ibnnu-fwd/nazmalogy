<?php

namespace App\Interfaces;

interface CourseChapterReviewInterface
{
    public function getAll();
    public function getById($id);
    public function getByCourseChapterId($course_chapter_id);
    public function store($course_chapter_id, $user_id, $rating, $content);
}

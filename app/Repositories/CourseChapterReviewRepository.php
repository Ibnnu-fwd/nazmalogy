<?php

namespace App\Repositories;

use App\Interfaces\CourseChapterReviewInterface;
use App\Models\CourseChapterReview;

class CourseChapterReviewRepository implements CourseChapterReviewInterface
{
    private $courseChapterReview;

    public function __construct(CourseChapterReview $courseChapterReview)
    {
        $this->courseChapterReview = $courseChapterReview;
    }

    public function getAll()
    {
        return $this->courseChapterReview->all();
    }

    public function getById($id)
    {
        return $this->courseChapterReview->findOrFail($id);
    }

    public function getByCourseChapterId($course_chapter_id)
    {
        return $this->courseChapterReview->where('course_chapter_id', $course_chapter_id)->get();
    }
}

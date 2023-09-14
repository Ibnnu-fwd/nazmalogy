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
}

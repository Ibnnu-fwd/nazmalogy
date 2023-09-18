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

    public function store($course_chapter_id, $user_id, $rating, $content)
    {
        $data = $this->courseChapterReview->where('course_chapter_id', $course_chapter_id)->where('user_id', $user_id)->first();
        if ($data) {
            return $data->update([
                'rating'  => $rating,
                'content' => $content,
            ]);
        }

        return $this->courseChapterReview->create([
            'course_chapter_id' => $course_chapter_id,
            'user_id'           => $user_id,
            'rating'            => $rating,
            'content'           => $content,
        ]);
    }
}

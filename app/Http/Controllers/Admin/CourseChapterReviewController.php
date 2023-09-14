<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\CourseChapterReviewInterface;
use App\Interfaces\CourseChapterInterface;
use Illuminate\Http\Request;

class CourseChapterReviewController extends Controller
{
   private $courseChapterReview;

    public function __construct(CourseChapterReviewInterface $courseChapterReview)
    {
        $this->courseChapterReview = $courseChapterReview;
    }

    public function index($course_chapter_id)
    {
        return view('admin.course_chapter_review.index', [
            'courseChapterReviews' => $this->courseChapterReview->getByCourseChapterId($course_chapter_id),
            'courseChapterId' => $course_chapter_id
        ]);
    }

    public function show($id)
    {
        return response()->json($this->courseChapterReview->getById($id));
    }

    
}

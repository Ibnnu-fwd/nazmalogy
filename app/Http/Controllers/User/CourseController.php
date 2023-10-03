<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\CourseInterface;
use App\Interfaces\CourseCategoryInterface;
use App\Interfaces\TransactionInterface;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private $course;
    private $courseCategory;
    private $transaction;

    public function __construct(CourseInterface $course, TransactionInterface $transaction, CourseCategoryInterface $courseCategory)
    {
        $this->course         = $course;
        $this->courseCategory = $courseCategory;
        $this->transaction    = $transaction;
    }

    public function index(Request $request)
    {
        return view('user.course.index', [
            'courseCategories' => $this->courseCategory->getAll()->where('is_active', 1),
            'courses'          => $this->course->getAll()->where('publish_status', 1)
        ]);
    }

    public function show($slug)
    {
        $course = $this->course->getBySlug($slug);
        return view('user.course.detail', [
            'course'   => $course,
            'isBought' => auth()->check() ? $this->transaction->getByUserId(auth()->user()->id)->pluck('course_id')->contains($course->id) : false,
        ]);
    }

    public function player()
    {
        return view('user.course.player');
    }

    public function filter()
    {
        $courses = $this->course->filter();
        return view('user.course.item', [
            'courses' => $courses
        ])->render();
    }
}

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
        $this->course      = $course;
        $this->courseCategory = $courseCategory;
        $this->transaction = $transaction;
    }

    public function index()
    {
        return view('user.course.index',[
            'courseCategories'    => $this->courseCategory->getAll(),
            'courses'             => $this->course->getAll(),
        ]);
    }

    public function show($id)
    {
        return view('user.course.detail', [
            'course'   => $this->course->getById($id),
            'isBought' => auth()->check() ? $this->transaction->getByUserId(auth()->user()->id)->pluck('course_id')->contains($id) : false,
        ]);
    }

    public function player()
    {
        return view('user.course.player');
    }
}

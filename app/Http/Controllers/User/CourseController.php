<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\CourseInterface;
use App\Interfaces\TransactionInterface;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private $course;
    private $transaction;

    public function __construct(CourseInterface $course, TransactionInterface $transaction)
    {
        $this->course      = $course;
        $this->transaction = $transaction;
    }

    public function index()
    {
        return view('user.course.index');
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

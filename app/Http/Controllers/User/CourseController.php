<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\CourseInterface;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private $course;

    public function __construct(CourseInterface $course)
    {
        $this->course = $course;
    }

    public function index()
    {
        return view('user.course.index');
    }

    public function show($id)
    {
        return view('user.course.detail', [
            'course' => $this->course->getById($id)
        ]);
    }

    public function player()
    {
        return view('user.course.player');
    }
}

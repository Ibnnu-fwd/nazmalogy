<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailCourseController extends Controller
{
    public function index()
    {
        return view('user.course.detail');
    }
}

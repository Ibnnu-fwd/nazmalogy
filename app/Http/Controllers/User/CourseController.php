<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show($id)
    {
        return view('user.course.detail');
    }

    public function player()
    {
        return view('user.course.player');
    }

}

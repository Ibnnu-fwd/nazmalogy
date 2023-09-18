<?php

namespace App\Http\Controllers\Facilitator;

use App\Http\Controllers\Controller;
use App\Interfaces\PointInterface;
use App\Interfaces\CourseInterface;
use App\Interfaces\UserCourseChapterLogInterface;
use Illuminate\Http\Request;

class PointController extends Controller
{
    private $point;

    public function __construct(PointInterface $point,CourseInterface $course,UserCourseChapterLogInterface $userChapterLog)
    {
        $this->point = $point;
        $this->course = $course;
        $this->userChapterLog = $userChapterLog;
    }

    public function index()
    {
        return view('facilitator.point.index', [
            'points' => $this->point->getByUserId(auth()->user()->id),
            'courses' => $this->course->getAllProgress(auth()->user()->id),
            'userChapterLogs' => $this->userChapterLog->getUserChapterLogByUserId(auth()->user()->id),
        ]);
    }

    public function show($id)
    {
        return response()->json($this->point->getById($id));
    }

    public function history($id)
    {
        return view('facilitator.point.history', [
            'points' => $this->point->getByUserId($id),
        ]);
    }
}

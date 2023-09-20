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

    public function __construct(PointInterface $point)
    {
        $this->point = $point;
    }

    public function index()
    {
        return view('facilitator.point.index', [
            'points' => $this->point->getByUserId(auth()->user()->id),
        ]);
    }
}

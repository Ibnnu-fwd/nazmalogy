<?php

namespace App\Http\Controllers\Facilitator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LearningHistoryController extends Controller
{
    private $userCourseChapterLog;

    public function __construct(usercoursechapterloginterface $userCourseChapterLog) {
        $this->userCourseChapterLog = $userCourseChapterLog;
    }

    public function index() {
        return view('facilitator.history.index', [
            'logs' => $this->userCourseChapterLog->getUserChapterLogByUserId(auth()->user()->id)
        ]);
    }
}

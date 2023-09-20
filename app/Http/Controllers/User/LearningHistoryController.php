<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\UserCourseChapterLogInterface;
use Illuminate\Http\Request;

class LearningHistoryController extends Controller
{
    private $userCourseChapterLog;

    public function __construct(usercoursechapterloginterface $userCourseChapterLog) {
        $this->userCourseChapterLog = $userCourseChapterLog;
    }

    public function index() {
        return view('user.history.index', [
            'logs' => $this->userCourseChapterLog->getUserChapterLogByUserId(auth()->user()->id)
        ]);
    }
}

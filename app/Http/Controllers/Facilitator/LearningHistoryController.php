<?php

namespace App\Http\Controllers\Facilitator;

use App\Http\Controllers\Controller;
use App\Interfaces\CourseInterface;
use App\Interfaces\TransactionInterface;
use App\Interfaces\UserCourseChapterLogInterface;
use Illuminate\Http\Request;

class LearningHistoryController extends Controller
{
    private $userCourseChapterLog;
    private $course;
    private $transaction;

    public function __construct(usercoursechapterloginterface $userCourseChapterLog, CourseInterface $course, TransactionInterface $transaction) {
        $this->userCourseChapterLog = $userCourseChapterLog;
        $this->course = $course;
        $this->transaction = $transaction;
    }

    public function index() {
        return view('facilitator.history.index', [
            'logs' => $this->userCourseChapterLog->getUserChapterLogByUserId(auth()->user()->id)
        ]);
    }

    public function member()  {
        return view('facilitator.history-member.index', [
            'courses' => $this->course->getCourseByAuthorId(auth()->user()->id)
        ]);
    }

    public function detail($course_id) {
        return view('facilitator.history-member.detail', [
            'logs' => $this->userCourseChapterLog->getUserChapterLogByAuthorId(auth()->user()->id, $course_id),
        ]);
    }

}

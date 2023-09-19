<?php

namespace App\Http\Controllers\Facilitator;

use App\Http\Controllers\Controller;
use App\Interfaces\CourseInterface;
use App\Interfaces\TransactionInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $transaction;
    private $course;

    public function __construct(TransactionInterface $transaction, CourseInterface $course)
    {
        $this->transaction = $transaction;
        $this->course = $course;
    }

    public function index()
    {
        return view('facilitator.dashboard.index', [
            'courses' => $this->course->getAllProgress(auth()->user()->id),
        ]);
    }
}

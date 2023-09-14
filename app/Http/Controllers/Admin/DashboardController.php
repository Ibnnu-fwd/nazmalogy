<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\CourseChapterReviewInterface;
use App\Interfaces\CourseInterface;
use App\Interfaces\TransactionInterface;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $course;
    private $user;
    private $transaction;
    private $courseChapterReview;

    public function __construct(CourseInterface $course, User $user, TransactionInterface $transaction, CourseChapterReviewInterface $courseChapterReview)
    {
        $this->course              = $course;
        $this->user                = $user;
        $this->transaction         = $transaction;
        $this->courseChapterReview = $courseChapterReview;
    }

    public function index()
    {
        return view('admin.dashboard.index', [
            'courses'          => $this->course->getAll(),
            'users'            => $this->user->all(),
            'totalTransaction' => $this->transaction->getAll()->sum('total_payment'),
            'totalReview'      => $this->courseChapterReview->getAll()->count()
        ]);
    }
}

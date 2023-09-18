<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\CourseLastTaskInterface;
use Illuminate\Http\Request;

class CourseLastTaskController extends Controller
{
    private $courseLastTask;

    public function __construct(CourseLastTaskInterface $courseLastTask)
    {
        $this->courseLastTask = $courseLastTask;
    }

    public function index($id)
    {
        return view('user.course.last_task', [
            'courseLastTask' => $this->courseLastTask->getById($id),
            'submission'     => $this->courseLastTask->getSubmissionByLastTaskId($id),
        ]);
    }

    public function attempt($id, Request $request)
    {
        $request->validate([
            'file' => ['required', 'max:10240', 'mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png']
        ]);

        try {
            $this->courseLastTask->attempt($id, $request->all());
            return redirect()->back()->with('success', 'Tugas berhasil diunggah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Tugas gagal diunggah');
        }
    }
}

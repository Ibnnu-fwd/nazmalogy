<?php

namespace App\Http\Controllers\Facilitator;

use App\Http\Controllers\Controller;
use App\Interfaces\SubmissionInterface;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    private $submission;

    public function __construct(SubmissionInterface $submission)
    {
        $this->submission = $submission;
    }
    public function index()
    {
        return view('facilitator.submission.index', [
            'submissions' => $this->submission->getByFacilitatorId(auth()->user()->id)
        ]);
    }

    public function show($id)
    {
        return response()->json($this->submission->getById($id));
    }

    public function changeStatus($id, Request $request)
    {
        $request->validate(['status' => ['required'], 'feedback' => ['required']]);

        try {
            $this->submission->changeStatus($id, $request->all());
            return redirect()->back()->with('success', 'Status berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Status gagal diubah');
        }
    }
}

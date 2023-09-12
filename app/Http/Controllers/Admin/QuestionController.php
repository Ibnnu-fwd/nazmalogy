<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\QuestionInterface;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    private $question;

    public function __construct(QuestionInterface $question)
    {
        $this->question = $question;
    }

    public function index($quiz_id)
    {
        return view('admin.question.index', [
            'quiz_id'  => $quiz_id,
            'question' => $this->question->getByQuizId($quiz_id),
        ]);
    }

    public function show($id)
    {
        return response()->json($this->question->getById($id));
    }

    public function store($quiz_id, Request $request)
    {

        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'option_1'    => 'required',
            'option_2'    => 'required',
            'option_3'    => 'required',
            'option_4'    => 'required',
            'answer'      => 'required',
        ]);


        try {
            $this->question->store(array_merge($request->all(), ['quiz_id' => $quiz_id]));
            return redirect()->back()->with('success', 'Soal berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Soal gagal ditambahkan');
        }
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'option_1'    => 'required',
            'option_2'    => 'required',
            'option_3'    => 'required',
            'option_4'    => 'required',
            'answer'      => 'required',
        ]);

        try {
            $this->question->update($id, $request->all());
            return redirect()->back()->with('success', 'Soal berhasil diperbarui');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Soal gagal diperbarui');
        }
    }

    public function destroy($id)
    {
        try {
            $this->question->destroy($id);
            return redirect()->back()->with('success', 'Soal berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Soal gagal dihapus');
        }
    }
}

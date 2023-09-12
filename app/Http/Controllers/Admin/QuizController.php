<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\PlaylistInterface;
use App\Interfaces\QuizInterface;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    private $quiz;
    private $playlist;

    public function __construct(QuizInterface $quiz, PlaylistInterface $playlist)
    {
        $this->quiz = $quiz;
        $this->playlist = $playlist;
    }

    public function index($playlist_id)
    {
        return view('admin.quiz.index', [
            'playlist_id' => $playlist_id,
            'quiz'        => $this->quiz->getByPlaylistId($playlist_id),
            'playlist'    => $this->playlist->getById($playlist_id),
        ]);
    }

    public function show($id)
    {
        return response()->json($this->quiz->getById($id));
    }

    public function store($playlist_id, Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
        ]);


        try {
            $this->quiz->store(array_merge($request->all(), ['playlist_id' => $playlist_id]));
            return redirect()->back()->with('success', 'Quiz berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Quiz gagal ditambahkan');
        }
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
        ]);

        try {
            $this->quiz->update($id, $request->all());
            return redirect()->back()->with('success', 'Quiz berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Quiz gagal diupdate');
        }
    }

    public function destroy($id)
    {
        try {
            $this->quiz->destroy($id);
            return redirect()->back()->with('success', 'Quiz berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Quiz gagal dihapus');
        }
    }
}

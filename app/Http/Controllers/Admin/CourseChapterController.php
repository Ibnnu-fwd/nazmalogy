<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\CourseChapterInterface;
use App\Interfaces\PlaylistInterface;
use Illuminate\Http\Request;

class CourseChapterController extends Controller
{
    private $courseChapter;
    private $playlist;

    public function __construct(CourseChapterInterface $courseChapter, PlaylistInterface $playlist)
    {
        $this->courseChapter = $courseChapter;
        $this->playlist      = $playlist;
    }

    public function index($playlistId)
    {
        return view('admin.course_chapter.index', [
            'courseChapters' => $this->courseChapter->getByPlaylistId($playlistId),
            'playlistId'     => $playlistId,
            'playlist'       => $this->playlist->getById($playlistId),
        ]);
    }

    public function show($id)
    {
        return response()->json($this->courseChapter->getById($id));
    }

    public function store($playlistId, Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'video_url'   => 'required',
            'duration'    => 'required',
        ]);

        try {
            $this->courseChapter->store(array_merge($request->all(), ['playlist_id' => $playlistId]));
            return redirect()->route('admin.course-chapter.index', $playlistId)->with('success', 'Chapter berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('admin.course-chapter.index', $playlistId)->with('error', 'Chapter gagal ditambahkan');
        }
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'video_url'   => 'required',
            'duration'    => 'required',
        ]);

        try {
            $this->courseChapter->update($id, $request->all());
            return redirect()->back()->with('success', 'Chapter berhasil diupdate');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', 'Chapter gagal diupdate');
        }
    }

    public function destroy($id)
    {
        try {
            $this->courseChapter->destroy($id);
            return redirect()->back()->with('success', 'Chapter berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Chapter gagal dihapus');
        }
    }
}

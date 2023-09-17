<?php

namespace App\Http\Controllers\Admin;

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

    public function index($course_id)
    {
        return view('admin.last_task.index', [
            'courseLastTasks' => $this->courseLastTask->getAll($course_id),
            'course_id'       => $course_id,
        ]);
    }

    public function show($id)
    {
        return response()->json($this->courseLastTask->getById($id));
    }

    public function store($course_id, Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
        ]);

        try {
            $this->courseLastTask->store($course_id, $request->all());
            return redirect()->back()->with('success', 'Tugas akhir berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Tugas akhir gagal ditambahkan');
        }
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
        ]);

        try {
            $this->courseLastTask->update($id, $request->all());
            return redirect()->back()->with('success', 'Tugas akhir berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Tugas akhir gagal diubah');
        }
    }

    public function destroy($id)
    {
        try {
            $this->courseLastTask->destroy($id);
            return redirect()->back()->with('success', 'Tugas akhir berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Tugas akhir gagal dihapus');
        }
    }

    public function restore($id)
    {
        try {
            $this->courseLastTask->restore($id);
            return redirect()->back()->with('success', 'Tugas akhir berhasil dikembalikan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Tugas akhir gagal dikembalikan');
        }
    }
}

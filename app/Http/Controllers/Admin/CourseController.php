<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\CourseCategoryInterface;
use App\Interfaces\CourseInterface;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private $course;
    private $courseCategory;

    public function __construct(CourseInterface $course, CourseCategoryInterface $courseCategory)
    {
        $this->course = $course;
        $this->courseCategory = $courseCategory;
    }

    public function index()
    {
        return view('admin.course.index', [
            'courses'          => $this->course->getAll(),
            'courseCategories' => $this->courseCategory->getAll()->where('is_active', 1),
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_category_id' => ['required', 'exists:course_categories,id'],
            'name'               => ['required', 'max:255'],
            'thumbnail'          => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'price'              => ['nullable'],
            'description'        => ['required'],
            'language'           => ['required'],
            'level'              => ['required'],
            'phone'              => ['required'],
        ]);

        try {
            $this->course->store($request->all());
            return redirect()->route('admin.course.index')->with('success', 'Kursus berhasil ditambahkan');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->route('admin.course.index')->with('error', $th->getMessage());
        }
    }

    public function show(string $id)
    {
        return response()->json($this->course->getById($id));
    }

    public function edit(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'        => ['required', 'max:255'],
            'thumbnail'   => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'price'       => ['nullable'],
            'description' => ['required'],
            'language'    => ['required'],
            'level'       => ['required'],
            'phone'       => ['required'],
        ]);

        try {
            $this->course->update($id, $request->all());
            return redirect()->route('admin.course.index')->with('success', 'Kursus berhasil diperbarui');
        } catch (\Throwable $th) {
            return redirect()->route('admin.course.index')->with('error', $th->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            $this->course->destroy($id);
            return response()->json(['message' => 'Kursus berhasil dihapus']);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Kursus gagal dihapus']);
        }
    }

    public function recover(string $id)
    {
        try {
            $this->course->recover($id);
            return response()->json(['message' => 'Kursus berhasil dipulihkan']);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Kursus gagal dipulihkan']);
        }
    }
}

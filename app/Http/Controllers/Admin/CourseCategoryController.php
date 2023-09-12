<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\CourseCategoryInterface;
use App\Interfaces\CourseInterface;
use Illuminate\Http\Request;

class CourseCategoryController extends Controller
{
    private $courseCategory;

    public function __construct(CourseCategoryInterface $courseCategory)
    {
        $this->courseCategory = $courseCategory;
    }

    public function index()
    {
        return view('admin.course_category.index', [
            'courseCategories' => $this->courseCategory->getAll(),
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => ['required'],
            'description' => ['required'],
            'icon'        => ['required'],
            'icon_color'  => ['required'],
        ]);

        try {
            $this->courseCategory->store($request->all());
            return redirect()->route('admin.course-category.index')->with('success', 'Kategori kursus berhasil ditambahkan');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->route('admin.course-category.index')->with('error', 'Kategori kursus gagal ditambahkan');
        }
    }

    public function show(string $id)
    {
        return response()->json($this->courseCategory->getById($id));
    }

    public function edit(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'        => ['required'],
            'description' => ['required'],
            'icon'        => ['required'],
            'icon_color'  => ['required'],
        ]);

        try {
            $this->courseCategory->update($id, $request->all());
            return redirect()->route('admin.course-category.index')->with('success', 'Kategori kursus berhasil diperbarui');
        } catch (\Throwable $th) {
            return redirect()->route('admin.course-category.index')->with('error', 'Kategori kursus gagal diperbarui');
        }
    }

    public function destroy(string $id)
    {
        try {
            $this->courseCategory->destroy($id);
            return redirect()->route('admin.course-category.index')->with('success', 'Kategori kursus berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('admin.course-category.index')->with('error', 'Kategori kursus gagal dihapus');
        }
    }

    public function restore($id)
    {
        try {
            $this->courseCategory->restore($id);
            return redirect()->route('admin.course-category.index')->with('success', 'Kategori kursus berhasil dipulihkan');
        } catch (\Throwable $th) {
            return redirect()->route('admin.course-category.index')->with('error', 'Kategori kursus gagal dipulihkan');
        }
    }
}

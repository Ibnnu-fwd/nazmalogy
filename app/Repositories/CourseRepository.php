<?php

namespace App\Repositories;

use App\Interfaces\CourseInterface;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;

class CourseRepository implements CourseInterface
{
    private $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function getAll()
    {
        return $this->course->with('courseCategory')->get();
    }

    public function getById($id)
    {
        return $this->course->with('courseCategory')->findOrFail($id);
    }

    public function store($data)
    {
        try {
            if (isset($data['thumbnail'])) {
                $thumbnailFileName = uniqid() . '.' . $data['thumbnail']->extension();
                $data['thumbnail']->storeAs('public/courses', $thumbnailFileName);
                $data['thumbnail'] = $thumbnailFileName;

                chmod(storage_path('app/public/courses/' . $thumbnailFileName), 0755);
            }

            $data['author_id'] = auth()->user()->id;
            return $this->course->create($data);
        } catch (\Throwable $th) {
            Storage::delete('public/courses/' . $thumbnailFileName);
            throw $th;
        }
    }

    public function update($id, $data)
    {
        try {
            $course = $this->course->findOrFail($id);

            if (isset($data['thumbnail'])) {
                $thumbnailFileName = uniqid() . '.' . $data['thumbnail']->extension();
                $data['thumbnail']->storeAs('public/courses', $thumbnailFileName);
                $data['thumbnail'] = $thumbnailFileName;
            }

            $data['author_id'] = auth()->user()->id;
            $course->update($data);

            return $course;
        } catch (\Throwable $th) {
            Storage::delete('public/courses/' . $thumbnailFileName);
            throw $th;
        }
    }

    public function destroy($id)
    {
        return $this->course->where('id', $id)->update(['is_active' => false]);
    }

    public function recover($id)
    {
        return $this->course->where('id', $id)->update(['is_active' => true]);
    }
}

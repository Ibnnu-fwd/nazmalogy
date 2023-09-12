<?php

namespace App\Repositories;

use App\Interfaces\CourseCategoryInterface;
use App\Models\Course;
use App\Models\CourseCategory;

class CourseCategoryRepository implements CourseCategoryInterface
{
    private $courseCategory;
    private $course;

    public function __construct(CourseCategory $courseCategory, Course $course)
    {
        $this->courseCategory = $courseCategory;
        $this->course = $course;
    }

    public function getAll()
    {
        return $this->courseCategory->all();
    }

    public function getById($id)
    {
        return $this->courseCategory->findOrFail($id);
    }

    public function store($data)
    {
        return $this->courseCategory->create($data);
    }

    public function update($id, $data)
    {
        return $this->courseCategory->findOrFail($id)->update($data);
    }

    public function destroy($id)
    {
        $courseCategory = $this->courseCategory->findOrFail($id);
        $courseCategory->is_active = false;
        $courseCategory->save();

        $this->course->where('course_category_id', $id)->update(['course_category_id' => 1]);

        return $courseCategory;
    }

    public function restore($id)
    {
        return $this->courseCategory->findOrFail($id)->update(['is_active' => true]);
    }
}

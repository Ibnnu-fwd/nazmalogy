<?php

namespace App\Repositories;

use App\Interfaces\CourseLastTaskInterface;
use App\Models\CourseLastTask;

class CourseLastTaskRepository implements CourseLastTaskInterface
{
    private $courseLastTask;

    public function __construct(CourseLastTask $courseLastTask)
    {
        $this->courseLastTask = $courseLastTask;
    }

    public function getAll($courseId)
    {
        return $this->courseLastTask->with('course')->where('course_id', $courseId)->get();
    }

    public function getById($id)
    {
        return $this->courseLastTask->find($id);
    }

    public function store($courseId, $data)
    {
        return $this->courseLastTask->create(array_merge($data, ['course_id' => $courseId]));
    }

    public function update($id, $data)
    {
        return $this->courseLastTask->find($id)->update($data);
    }

    public function destroy($id)
    {
        return $this->courseLastTask->find($id)->update(['is_active' => false]);
    }

    public function restore($id)
    {
        return $this->courseLastTask->find($id)->update(['is_active' => true]);
    }
}

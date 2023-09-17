<?php

namespace App\Interfaces;

interface CourseLastTaskInterface
{
    public function getAll($courseId);
    public function getById($id);
    public function store($courseId, $data);
    public function update($id, $data);
    public function destroy($id);
    public function restore($id);
}

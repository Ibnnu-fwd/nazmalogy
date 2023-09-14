<?php

namespace App\Interfaces;

interface CourseInterface
{
    public function getAll();
    public function getById($id);
    public function store($data);
    public function update($id, $data);
    public function destroy($id);
    public function recover($id);

    public function getUserProgress($courseId, $userId);
    public function getAllProgress($userId);
}

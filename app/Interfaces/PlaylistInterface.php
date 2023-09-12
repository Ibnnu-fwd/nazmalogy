<?php

namespace App\Interfaces;

interface PlaylistInterface
{
    public function getAll();
    public function getByCourseId($course_id);
    public function getById($id);
    public function store($params);
    public function update($id, $params);
    public function destroy($id);
}

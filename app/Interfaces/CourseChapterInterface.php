<?php

namespace App\Interfaces;

interface CourseChapterInterface
{
    public function getByPlaylistId($playlistId);
    public function getById($id);
    public function store($data);
    public function update($id, $request);
    public function destroy($id);
}

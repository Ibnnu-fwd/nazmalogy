<?php

namespace App\Repositories;

use App\Interfaces\PlaylistInterface;
use App\Models\Playlist;

class PlaylistRepository implements PlaylistInterface
{
    private $playlist;

    public function __construct(Playlist $playlist)
    {
        $this->playlist = $playlist;
    }

    public function getAll()
    {
        return $this->playlist->all();
    }

    public function getById($id)
    {
        return $this->playlist->findOrFail($id);
    }

    public function store($params)
    {
        return $this->playlist->create($params);
    }

    public function update($id,  $params)
    {
        $playlist = $this->playlist->findOrFail($id);
        $playlist->update($params);
        return $playlist;
    }

    public function destroy($id)
    {
        $playlist = $this->playlist->findOrFail($id);
        $playlist->quiz()->delete();
        $playlist->chapters()->delete();
        $playlist->delete();
        return $playlist;
    }

    public function getByCourseId($course_id)
    {
        return $this->playlist->where('course_id', $course_id)->get();
    }
}

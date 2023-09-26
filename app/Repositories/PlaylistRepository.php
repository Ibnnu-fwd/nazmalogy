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

        // check if playlist is the last playlist in course, if true, set course publish_status to false
        $course = $playlist->course;
        if ($course->playlists()->count() == 1) {
            $course->update([
                'publish_status' => false
            ]);
        }

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

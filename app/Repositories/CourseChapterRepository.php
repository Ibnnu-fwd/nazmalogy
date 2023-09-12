<?php

namespace App\Repositories;

use App\Interfaces\CourseChapterInterface;
use App\Models\CourseChapter;

class CourseChapterRepository implements CourseChapterInterface
{
    private $courseChapter;

    public function __construct(CourseChapter $courseChapter)
    {
        $this->courseChapter = $courseChapter;
    }

    public function getByPlaylistId($playlistId)
    {
        return $this->courseChapter->where('playlist_id', $playlistId)->get();
    }

    public function getById($id)
    {
        return $this->courseChapter->find($id);
    }

    public function store($data)
    {
        $duration = explode(':', $data['duration']);
        $data['duration'] = $duration[0] * 60 + $duration[1];
        return $this->courseChapter->create($data);
    }

    public function update($id, $request)
    {
        $duration = explode(':', $request['duration']);
        $request['duration'] = $duration[0] * 60 + $duration[1];
        return $this->courseChapter->find($id)->update($request);
    }

    public function destroy($id)
    {
        return $this->courseChapter->find($id)->delete();
    }
}

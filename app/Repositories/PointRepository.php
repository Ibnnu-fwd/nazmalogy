<?php

namespace App\Repositories;

use App\Interfaces\PlaylistInterface;
use App\Interfaces\PointInterface;
use App\Models\Playlist;

class PointRepository implements PointInterface
{
    private $point;

    public function __construct(Playlist $point)
    {
        $this->point = $point;
    }

    public function getAll()
    {
        return $this->point->all();
    }

    public function getById($id)
    {
        return $this->point->findOrFail($id);
    }

    public function getByUserId($users_id)
    {
        return $this->point->where('users_id', $users_id)->get();
    }
}

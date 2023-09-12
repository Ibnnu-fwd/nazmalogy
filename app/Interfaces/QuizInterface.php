<?php

namespace App\Interfaces;

interface QuizInterface
{
    public function getByPlaylistId($playlistId);
    public function getById($id);
    public function store($data);
    public function update($id, $data);
    public function destroy($id);
}

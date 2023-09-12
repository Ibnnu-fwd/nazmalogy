<?php

namespace App\Repositories;

use App\Interfaces\QuizInterface;
use App\Models\Quiz;

class QuizRepository implements QuizInterface
{
    private $quiz;

    public function __construct(Quiz $quiz)
    {
        $this->quiz = $quiz;
    }

    public function getByPlaylistId($playlistId)
    {
        return $this->quiz->where('playlist_id', $playlistId)->with('questions')->first();
    }

    public function getById($id)
    {
        return $this->quiz->findOrFail($id);
    }

    public function store($data)
    {
        return $this->quiz->create($data);
    }

    public function update($id, $data)
    {
        return $this->quiz->findOrFail($id)->update($data);
    }

    public function destroy($id)
    {
        return $this->quiz->findOrFail($id)->delete();
    }
}

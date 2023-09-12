<?php

namespace App\Repositories;

use App\Interfaces\QuestionInterface;
use App\Models\Question;

class QuestionRepository implements QuestionInterface
{
    private $question;

    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    public function getByQuizId($quiz_id)
    {
        return $this->question->where('quiz_id', $quiz_id)->get();
    }

    public function getById($id)
    {
        return $this->question->findOrFail($id);
    }

    public function store($data)
    {
        return $this->question->create($data);
    }

    public function update($id, $data)
    {
        return $this->getById($id)->update($data);
    }

    public function destroy($id)
    {
        return $this->getById($id)->delete();
    }
}

<?php

namespace App\Interfaces;

interface QuestionInterface
{
    public function getByQuizId($quiz_id);
    public function getById($id);
    public function store($data);
    public function update($id, $data);
    public function destroy($id);
}

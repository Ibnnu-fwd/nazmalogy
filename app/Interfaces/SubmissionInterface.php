<?php

namespace App\Interfaces;

interface SubmissionInterface
{
    public function getByFacilitatorId($id);
    public function changeStatus($id, $data);
    public function getById($id);
}

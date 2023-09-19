<?php

namespace App\Repositories;

use App\Interfaces\SubmissionInterface;
use App\Models\Course;
use App\Models\Submission;

class SubmissionRepository implements SubmissionInterface
{
    private $submission;
    private $course;

    public function __construct(Submission $submission, Course $course)
    {
        $this->submission = $submission;
        $this->course = $course;
    }

    public function getByFacilitatorId($id)
    {
        return $this->submission
            ->with(['course_last_task', 'user'])
            ->whereHas('course', function ($query) use ($id) {
                $query->where('author_id', $id);
            })->get();
    }

    public function changeStatus($id, $data)
    {
        return $this->submission->find($id)->update($data);
    }

    public function getById($id)
    {
        return $this->submission->with(['course_last_task', 'user'])->find($id);
    }
}

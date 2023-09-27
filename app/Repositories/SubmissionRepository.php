<?php

namespace App\Repositories;

use App\Interfaces\SubmissionInterface;
use App\Models\Course;
use App\Models\Point;
use App\Models\PointType;
use App\Models\Submission;

class SubmissionRepository implements SubmissionInterface
{
    private $submission;
    private $course;

    public function __construct(Submission $submission, Course $course)
    {
        $this->submission = $submission;
        $this->course     = $course;
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
        $submission = $this->submission->find($id);

        if ($data['status'] == 'approved') {
            $pointType = PointType::where('name', 'submission_approved')->first();
            $point = Point::updateOrCreate(
                [
                    'user_id'       => $submission->user_id,
                    'point_type_id' => $pointType->id,
                    'description'   => 'Submission approved: ' . $this->course->find($submission->course_id)->name,
                ],
                [
                    'amount' => $pointType->amount,
                ]
            );  
        }

        $submission->update($data);
        return $submission;
    }

    public function getById($id)
    {
        return $this->submission->with(['course_last_task', 'user'])->find($id);
    }
}

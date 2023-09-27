<?php

namespace App\Repositories;

use App\Interfaces\CourseLastTaskInterface;
use App\Models\CourseLastTask;
use App\Models\Point;
use App\Models\PointType;
use App\Models\Submission;
use Illuminate\Support\Facades\Storage;

class CourseLastTaskRepository implements CourseLastTaskInterface
{
    private $courseLastTask;
    private $submission;

    public function __construct(CourseLastTask $courseLastTask, Submission $submission)
    {
        $this->courseLastTask = $courseLastTask;
        $this->submission     = $submission;
    }

    public function getAll($courseId)
    {
        return $this->courseLastTask->with('course')->where('course_id', $courseId)->get();
    }

    public function getById($id)
    {
        return $this->courseLastTask->find($id);
    }

    public function store($courseId, $data)
    {
        return $this->courseLastTask->create(array_merge($data, ['course_id' => $courseId]));
    }

    public function update($id, $data)
    {
        return $this->courseLastTask->find($id)->update($data);
    }

    public function destroy($id)
    {
        return $this->courseLastTask->find($id)->update(['is_active' => false]);
    }

    public function restore($id)
    {
        return $this->courseLastTask->find($id)->update(['is_active' => true]);
    }

    public function getSubmissionByLastTaskId($id)
    {
        return $this->submission->where('course_last_task_id', $id)->first();
    }

    public function attempt($id, $data)
    {
        // Find the submission record
        $submission = $this->submission->with('course_last_task')->where('id', $id)->first();

        // Get the point type for submissions
        $pointType = PointType::where('name', 'submission')->first();

        // Define the description for points
        $description = 'Submission ' . $submission->course_last_task->name;

        // Check if a point record exists, and create one if not
        if (!$submission) {
            Point::updateOrCreate(
                [
                    'user_id'       => auth()->user()->id,
                    'point_type_id' => $pointType->id,
                    'description'   => $description,
                ],
                [
                    'amount' => $pointType->amount,
                ]
            );
        }

        if ($submission) {
            // Handle file upload and update submission details
            if ($submission->attachment) {
                // Delete the old attachment
                Storage::delete('public/submissions/' . $submission->attachment);
            }

            $filename = uniqid() . '.' . $data['file']->extension();
            $data['file']->storeAs('public/submissions', $filename);

            // Update submission details
            $submission->update([
                'attachment'  => $filename,
                'description' => $data['description'],
                'status'      => Submission::PENDING_STATUS,
            ]);

            return $submission;
        } else {
            // Create a new submission
            $filename = uniqid() . '.' . $data['file']->extension();
            $data['file']->storeAs('public/submissions', $filename);

            try {
                return $this->submission->create([
                    'course_last_task_id' => $id,
                    'user_id'             => auth()->user()->id,
                    'course_id'           => $this->courseLastTask->find($id)->course_id,
                    'attachment'          => $filename,
                    'description'         => $data['description'],
                    'status'              => Submission::PENDING_STATUS,
                ]);
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }
}

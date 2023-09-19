<?php

namespace App\Repositories;

use App\Interfaces\CourseLastTaskInterface;
use App\Models\CourseLastTask;
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
        $submission = $this->submission->find($id);

        if ($submission) {
            if ($submission->attachment) {
                Storage::delete('public/submissions/' . $submission->attachment);
                $filename = uniqid() . '.' . $data['file']->extension();
                $data['file']->storeAs('public/submissions', $filename);
                $data['file'] = $filename;
            }

            return $submission->update([
                'attachment'  => $data['file'],
                'description' => $data['description'],
                'status'      => Submission::PENDING_STATUS,
            ]);
        } else {
            $filename = uniqid() . '.' . $data['file']->extension();
            $data['file']->storeAs('public/submissions', $filename);
            $data['file'] = $filename;

            try {
                return $this->submission->create([
                    'course_last_task_id' => $id,
                    'user_id'             => auth()->user()->id,
                    'course_id'           => $this->courseLastTask->find($id)->course_id,
                    'attachment'          => $data['file'],
                    'description'         => $data['description'],
                    'status'              => Submission::PENDING_STATUS,
                ]);
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    const PENDING_STATUS  = 'pending';
    const APPROVED_STATUS = 'approved';
    const REJECTED_STATUS = 'rejected';

    use HasFactory;

    protected $fillable = [
        'course_last_task_id',
        'user_id',
        'course_id',
        'attachment',
        'description',
        'status',
        'feedback'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function course_last_task()
    {
        return $this->belongsTo(CourseLastTask::class, 'course_last_task_id');
    }
}

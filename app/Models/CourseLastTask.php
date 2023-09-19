<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLastTask extends Model
{
    use HasFactory;

    public $table = 'course_last_tasks';

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'is_active',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function submissions()
    {
        return $this->hasOne(Submission::class, 'course_last_task_id');
    }
}

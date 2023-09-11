<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourseChapterLog extends Model
{
    use HasFactory;

    public $table = 'user_course_chapter_logs';

    protected $fillable = [
        'user_id',
        'course_chapter_id',
        'finished_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function courseChapter()
    {
        return $this->belongsTo(CourseChapter::class, 'course_chapter_id');
    }
}

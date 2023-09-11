<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseChapter extends Model
{
    use HasFactory;

    public $table = 'course_chapters';

    protected $fillable = [
        'playlist_id',
        'title',
        'is_active',
        'description',
        'video_url',
        'duration',
    ];

    public function playlist()
    {
        return $this->belongsTo(Playlist::class, 'playlist_id');
    }

    public function reviews()
    {
        return $this->hasMany(CourseChapterReview::class, 'course_chapter_id');
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'course_chapter_id');
    }

    public function courseChapterLogs()
    {
        return $this->hasMany(UserCourseChapterLog::class, 'course_chapter_id');
    }
}

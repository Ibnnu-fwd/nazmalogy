<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseChapterReview extends Model
{
    use HasFactory;

    public $table = 'course_chapter_reviews';

    protected $fillable = [
        'course_chapter_id',
        'user_id',
        'rating',
        'content',
    ];

    public function courseChapter()
    {
        return $this->belongsTo(CourseChapter::class, 'course_chapter_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

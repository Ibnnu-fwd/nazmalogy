<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    public $table = 'playlists';

    protected $fillable = [
        'course_id',
        'title',
        'is_active'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function chapters()
    {
        return $this->hasMany(CourseChapter::class, 'playlist_id');
    }

    public function quiz()
    {
        return $this->hasOne(Quiz::class, 'playlist_id');
    }
}

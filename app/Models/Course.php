<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public $table = 'courses';

    protected $fillable = [
        'course_category_id',
        'name',
        'thumbnail',
        'price',
        'description',
        'language',
        'level',
        'phone',
        'is_active',
        'publish_status',
        'author_id',
    ];

    public function courseCategory()
    {
        return $this->belongsTo(CourseCategory::class, 'course_category_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function playlists()
    {
        return $this->hasMany(Playlist::class, 'course_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'course_id');
    }
}

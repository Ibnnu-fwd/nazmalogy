<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    use HasFactory;

    public $table = 'course_categories';

    protected $fillable = [
        'name',
        'description',
        'icon',
        'icon_color',
        'is_active',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class, 'course_category_id');
    }
}

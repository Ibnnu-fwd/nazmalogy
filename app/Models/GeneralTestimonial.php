<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralTestimonial extends Model
{
    use HasFactory;

    public $table = 'general_testimonials';

    protected $fillable = [
        'user_id',
        'content',
        'rating'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

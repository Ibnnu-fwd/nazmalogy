<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public $table = 'questions';

    protected $fillable = [
        'quiz_id',
        'title',
        'is_active',
        'description',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
        'answer'
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
}

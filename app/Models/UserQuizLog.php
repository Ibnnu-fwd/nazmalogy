<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuizLog extends Model
{
    use HasFactory;

    public $table = 'user_quiz_logs';

    protected $fillable = [
        'user_id',
        'quiz_id',
        'correct_answers',
        'finished_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
}

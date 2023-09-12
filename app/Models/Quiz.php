<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    public $table = 'quizzes';

    protected $fillable = [
        'playlist_id',
        'title',
        'is_active',
        'description',
    ];

    public function playlist()
    {
        return $this->belongsTo(Playlist::class, 'playlist_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'quiz_id');
    }

    public function userQuizLogs()
    {
        return $this->hasMany(UserQuizLog::class, 'quiz_id');
    }
}

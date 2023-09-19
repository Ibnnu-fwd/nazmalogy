<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'email',
        'password',
        'gender',
        'phone',
        'birth',
        'avatar',
        'role',
        'last_login',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];

    public function generalTestimonials()
    {
        return $this->hasMany(GeneralTestimonial::class, 'user_id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'author_id');
    }

    public function courseChapterReviews()
    {
        return $this->hasMany(CourseChapterReview::class, 'user_id');
    }

    public function userCourseChapterLogs()
    {
        return $this->hasMany(UserCourseChapterLog::class, 'user_id');
    }

    public function userQuizLogs()
    {
        return $this->hasMany(UserQuizLog::class, 'user_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'user_id');
    }

    public function points()
    {
        return $this->hasMany(Point::class, 'user_id');
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class, 'user_id');
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class, 'user_id');
    }

    public function referals()
    {
        return $this->hasMany(Referal::class, 'user_id');
    }
}

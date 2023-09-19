<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    const STATUS_PENDING = 'pending';
    const STATUS_PAID    = 'paid';
    const STATUS_CONFIRM = 'confirm';
    const STATUS_CANCEL  = 'cancel';

    use HasFactory;

    public $table = 'transactions';

    protected $fillable = [
        'course_id',
        'user_id',
        'ref_code',
        'price',
        'sub_total',
        'total_payment',
        'status',
        'payment_proof_file',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function attemptReferal()
    {
        return $this->hasOne(AttemptReferal::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttemptReferal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaction_id',
        'ref_code',
        'is_success',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}

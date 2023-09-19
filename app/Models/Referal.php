<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referal extends Model
{
    use HasFactory;

    public $table = 'referals';

    protected $fillable = [
        'ref_code',
        'user_id',
        'expire_at',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

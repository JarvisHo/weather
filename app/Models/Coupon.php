<?php

namespace App\Models;

use App\Models\Traits\HasUniqueCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory, HasUniqueCode;

    protected $fillable = [
        'title',
        'code',
        'type',
        'amount',
        'expire_in_days',
        'condition_id',
        'prize_id',
        'user_id',
        'expired_at',
        'used_at',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function prize()
    {
        return $this->belongsTo(Prize::class);
    }
}

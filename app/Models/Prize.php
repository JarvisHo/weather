<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/** 獎池，從中抽出獎品可得折扣券 */
class Prize extends Model
{
    use HasFactory, hasUuid;

    const PRIZE_NO = 0;
    const PRIZE_WIN = 1;

    protected $fillable = [
        'title', // 獎項名稱
        'rate', // 中獎概率
        'type', // 0:落空,1:送折價券
        'coupon_type', // 0:折現金,1:折比率
        'coupon_amount', // 折扣額度
        'coupon_expire_in_days', // 幾天後過期
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function conditions()
    {
        return $this->belongsToMany(Condition::class, 'condition_prize');
    }
}

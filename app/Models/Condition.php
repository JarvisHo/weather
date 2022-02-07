<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/** 可抽獎的條件，在完成洗車紀錄後檢查 */
class Condition extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        'title',     // 標題
        'target',    // 0:洗車,1:項目,2:標籤
        'target_id', // 可指定特定項目或標籤
        'threshold', // 次數門檻
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function prizes()
    {
        return $this->belongsToMany(Prize::class, 'condition_prize');
    }
}

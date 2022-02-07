<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory, hasUuid;

    protected $fillable = [
      'title',
      'text',
      'href',
      'type',
      'target',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function images()
    {
        return $this->belongsToMany(Image::class, 'sale_image');
    }
}

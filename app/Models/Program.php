<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory, hasUuid;

    protected $fillable = [
        'name'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function tools()
    {
        return $this->belongsToMany(Tool::class, 'program_tool');
    }

    public function record()
    {
        return $this->hasOne(Record::class)->orderBy('id', 'desc');
    }
}

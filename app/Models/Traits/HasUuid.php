<?php


namespace App\Models\Traits;

trait HasUuid
{
    public static function boot()
    {
        parent::boot();
        static::creating(function ($callback) {
            if (empty($callback->uuid)) {
                $uuid = sha1(time() . random_int(0, 99999));
                while (static::where('uuid', $uuid)->limit(1)->count() > 0) {
                    $uuid = sha1(time() . random_int(0, 99999));
                }
                $callback->uuid = $uuid;
            }
        });
    }
}
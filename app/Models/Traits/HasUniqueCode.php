<?php


namespace App\Models\Traits;

trait HasUniqueCode
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
        static::creating(function ($callback) {
            if (empty($callback->code)) {
                $code = 'WK' . random_int(10000, 99999) . random_int(1000, 9999);
                while (static::where('code', $code)->limit(1)->count() > 0) {
                    $code = 'WK' . random_int(10000, 99999) . random_int(1000, 9999);
                }
                $callback->code = $code;
            }
        });
    }
}

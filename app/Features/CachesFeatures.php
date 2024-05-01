<?php

namespace App\Features;

use Illuminate\Support\Facades\Cache;

trait CachesFeatures
{
    public static function retrieveCached()
    {
        return Cache::remember(static::$CACHE_KEY, now()->addMinutes(20), function () {
            return static::all();
        });
    }

    public static function clearCached()
    {
        Cache::forget(static::$CACHE_KEY);
    }
}

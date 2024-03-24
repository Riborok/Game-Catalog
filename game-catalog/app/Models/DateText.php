<?php

namespace App\Models;

use App\Features\CachesFeatures;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class DateText extends Model
{
    use CachesFeatures;

    protected static $CACHE_KEY = 'dates';

    protected $fillable = [
        'date',
        'text',
    ];

    public static function whereDate($date)
    {
        $texts = static::query()->where('date', $date)->pluck('text')->toArray();
        return implode(', ', $texts);
    }

    public static function retrieveCachedCalendar($year, $month, $callback)
    {
        $cacheKey = static::generateCacheKey($year, $month);
        return Cache::remember($cacheKey, now()->addMinutes(5), $callback);
    }

    public static function clearCachedCalendar($date)
    {
        $cacheKey = static::generateCacheKey($date->year, $date->month);
        Cache::forget($cacheKey);
    }

    private static function generateCacheKey($year, $month)
    {
        return 'calendar_' . $year . '_' . $month;
    }
}

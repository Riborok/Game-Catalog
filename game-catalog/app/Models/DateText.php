<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateText extends Model
{
    protected $fillable = [
        'date',
        'text',
    ];

    public static function whereDate($date)
    {
        $texts = static::query()->where('date', $date)->pluck('text')->toArray();
        return implode(', ', $texts);
    }
}

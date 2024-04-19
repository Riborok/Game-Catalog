<?php

namespace App\Models;

use App\Features\CachesFeatures;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use CachesFeatures;

    protected static $CACHE_KEY = 'games';

    protected $fillable = [
        'title', 'description', 'image', 'link',
    ];
}

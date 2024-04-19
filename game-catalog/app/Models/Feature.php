<?php

namespace App\Models;

use App\Features\CachesFeatures;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use CachesFeatures;

    protected static $CACHE_KEY = 'features';

    protected $fillable = [
        'title', 'text', 'image', 'order'
    ];
}

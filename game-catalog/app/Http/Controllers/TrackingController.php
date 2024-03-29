<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\Cookie;

class TrackingController extends Controller
{
    private static $KEY = 'visited_pages';
    private static $DEFAULT = '[]';

    public static function trackPages($name, $params = []) {
        $visitedPages = static::updateVisitedPages($name);
        return static::packRequest($name, $params, $visitedPages);
    }

    private static function updateVisitedPages($name)
    {
        $visitedPages = static::visitedPages();
        $visitedPages[] = ['name' => $name, 'timestamp' => time()];
        $visitedPages = array_slice($visitedPages, -42);
        return $visitedPages;
    }

    private static function visitedPages()
    {
        $visitedPages = request()->cookie(static::$KEY, static::$DEFAULT);
        return json_decode($visitedPages, true);
    }

    private static function packRequest($name, $params, $visitedPages)
    {
        return response(view($name, $params))->cookie(static::$KEY, json_encode($visitedPages));
    }

    public function showVisitedPages()
    {
        $visitedPages = static::updateVisitedPages('visited-pages');
        return static::packRequest('visited-pages', ['visitedPages' => $visitedPages], $visitedPages);
    }
}

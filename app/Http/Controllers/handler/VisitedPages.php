<?php

namespace App\Http\Controllers\handler;

use App\Http\Controllers\Controller;
use App\Utils\Other;

class VisitedPages extends Controller
{
    private static $KEY = 'visited_pages';
    private static $DEFAULT = '[]';

    public static function view($name, $params = []) {
        $visitedPages = static::updateVisitedPages($name);
        return static::packRequest($name, $params, $visitedPages);
    }

    private static function updateVisitedPages($name)
    {
        $visitedPages = static::visitedPages();
        array_unshift($visitedPages, ['name' => Other::getLastWord($name), 'timestamp' => date('Y-m-d H:i:s', time())]);
        return array_slice($visitedPages, 0, 35);
    }

    private static function visitedPages()
    {
        $visitedPages = request()->cookie(static::$KEY, static::$DEFAULT);
        return json_decode($visitedPages, true);
    }

    private static function packRequest($name, $params, $visitedPages)
    {
        return response(view($name, $params))->cookie(static::$KEY, json_encode($visitedPages), 120);
    }

    public function showVisitedPages()
    {
        $visitedPages = static::updateVisitedPages('visited-pages');
        return static::packRequest('pages.visited-pages', ['visitedPages' => $visitedPages], $visitedPages);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkClickController extends Controller
{
    public function handle(Request $request): string
    {
        $url = urldecode($request->input('url'));

        $Link = Link::firstOrCreate(
            ['url' => $url],
            ['clicks' => 0]
        );

        $Link->increment('clicks');
        return redirect()->away($url)->send();
    }
}

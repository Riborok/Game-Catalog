<?php

namespace App\Http\Middleware;

use App\Models\Activity;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
use Symfony\Component\HttpFoundation\Response;

class TrackUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $agent = new Agent();
        $agent->setUserAgent($request->header('User-Agent'));

        Activity::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'ip' => $request->ip(),
                'os' => $agent->platform(),
                'browser' => $agent->browser() . ' v.' . $agent->version($agent->browser()),
            ]
        );

        return $next($request);
    }
}

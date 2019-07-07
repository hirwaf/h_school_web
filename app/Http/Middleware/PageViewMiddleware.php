<?php

namespace App\Http\Middleware;

use Closure;

class PageViewMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $key = $request->get('_key');
        $config_key = config('pageview.key');

        if ($key != $config_key)
            return abort(404);

        return $next($request);
    }
}

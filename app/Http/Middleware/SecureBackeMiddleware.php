<?php

namespace App\Http\Middleware;

use Closure;

class SecureBackeMiddleware
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
        return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')->header('Pragma','no-cache')->header('Expires',0);
    }
}

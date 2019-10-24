<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceHTPPS
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
        if (!\Request::isSecure() && config('app.env') === 'production') {
            return redirect($request->getRequestUri(), 200, [], true);
        }

        return $next($request);
    }
}

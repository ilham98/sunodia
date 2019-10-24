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
        if (!request()->isSecure() && config('app.env') === 'production') {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}

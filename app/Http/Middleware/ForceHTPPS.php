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
        $secure_url = secure_url($request->getRequestUri());
        if (substr($secure_url, 0, 8) != 'https://' && config('app.env') === 'production') {
            return redirect(secure_url($request->getRequestUri()));
        }
        return $next($request);
    }
}

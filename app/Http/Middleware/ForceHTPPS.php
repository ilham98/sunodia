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
        $url = parse_url(secure_url($request->getRequestUri()));
        dd($url);
        if ($url['scheme'] != 'https' && config('app.env') === 'production') {
            return redirect(secure_url($request->getRequestUri()));
        }
        return $next($request);
    }
}

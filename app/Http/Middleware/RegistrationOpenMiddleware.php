<?php

namespace App\Http\Middleware;

use Closure;
use App\Konfigurasi;

class RegistrationOpenMiddleware
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
        if(Konfigurasi::first()->registrasi_open == 0)
            return redirect(url('/'));
        return $next($request);
    }
}

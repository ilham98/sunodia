<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Crypt;
use App\RegistrasiSiswa;

class RegistrasiMiddleware
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
        $step = explode('/', url()->current());
        $step = $step[count($step)-1];
        if($request->cookie('registrasi_token')) {
            $id = $request->cookie('registrasi_token');
            $reg = RegistrasiSiswa::find($id);
            if(!$reg) {
                return redirect('registrasi')->withCookie(\Cookie::forget('registrasi_token'));
            } else if($step == $reg->last_step)
                return $next($request);
        }

        
        return redirect(url('registrasi'));        
    }
}

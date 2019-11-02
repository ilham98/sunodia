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
            $req = null;
            $id = $request->cookie('registrasi_token');
            $reg = RegistrasiSiswa::find($id);
            if(!$reg && !$request->cookie('sesi_registrasi')) {
                return $reg->withCookie(\Cookie::forget('registrasi_token'))
                        ->withCookie(\Cookie::forget('sesi_registrasi'));
                
            } else if(!$request->cookie('sesi_registrasi')) {
                return redirect('registrasi')->withCookie(cookie()->forever('sesi_registrasi', json_encode([$reg->id])));
            } else if($step == $reg->last_step)
                return $next($request);
        }

       

        
        return redirect(url('registrasi'));        
    }
}

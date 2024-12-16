<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if(!Session::has('user') || !Session::get('user')->token){
            return redirect()->route('inicio')->with('error', 'Debes iniciar sesion para acceder');
        }
        return $next($request);
    }
}

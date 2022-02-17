<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CORS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
<<<<<<< HEAD
        header('Access-Control-Allow-Origin' ,'*');
        header( 'Access-Control-Allow-Methods', '*');
        header( 'Access-Control-Allow-Headers', '*');
        return $next($request);
=======

        return $next($request)->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Method', '*')
        -> header('Access-Control-Allow-Header', '*');
>>>>>>> 06a52d866e56aa0dd4a2d42ccd02734b03c64d0e
    }
}

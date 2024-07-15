<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CustomAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->usertype == 'admin') {
            return $next($request);
        }elseif(Auth::check() && Auth::user()->usertype == 'user'){
            return redirect()->route('dashboard');
        }elseif(Auth::check() && Auth::user()->usertype == 'instructor'){
            return $next($request);
        }else{
            return redirect()->route('login');
        }

        return $next($request);
    }
}

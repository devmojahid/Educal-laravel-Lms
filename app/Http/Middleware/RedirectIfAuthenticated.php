<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (Auth::user()->usertype == 'admin') {
                    return redirect(RouteServiceProvider::ADMIN);
                } elseif (Auth::user()->usertype == 'user') {
                    return redirect(RouteServiceProvider::HOME);
                } elseif (Auth::user()->usertype == 'instructor') {
                    return redirect(RouteServiceProvider::ADMIN);
                } else {
                    return redirect(RouteServiceProvider::HOME);
                }
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEnvValue
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (env("DB_DATABASE") === "" && env("DB_USERNAME") === "") {
            if(current(explode('/', $request->path())) !== 'install') {
                return redirect($request->path() . '/install');
            } else {
                return $next($request);
            }
        } else {
            return $next($request);
        }
    }
}

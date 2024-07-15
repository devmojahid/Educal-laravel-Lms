<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\File;

class AppInstaller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!File::exists(base_path('.envs'))) {
            return redirect()->route('about');
        }
        // Check if the .env file exists
        if (!file_exists(__DIR__.'/../../../.envs')) {
            return $next($request);
        }else{
            return $next($request);
        }
        return $next($request);
    }
}
  
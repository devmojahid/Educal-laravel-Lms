<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DemoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //if app is in demo mode, post , put , delete requests are not allowed 
        if (config('app.env') === 'demo') {
            if ($request->isMethod('POST') || $request->isMethod('PUT') || $request->isMethod('DELETE')) {
                //if request is ajax
                if ($request->ajax()) {
                    return response()->json([
                        'status'=>'success',
                        'error' => 'Demo purposes: POST, PUT, and DELETE requests are not allowed in "demo" mode.',
                        'message'=>'Demo purposes: POST, PUT, and DELETE requests are not allowed in "demo" mode',
                    ]);
                }
                // Redirect the user back to the previous page with an error message
                return redirect()->back()->with('error', 'Demo purposes: POST, PUT, and DELETE requests are not allowed in "demo" mode.');
            }
        }
        return $next($request);
    }
}

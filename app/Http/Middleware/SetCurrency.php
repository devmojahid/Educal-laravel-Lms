<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;


class SetCurrency
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            DB::connection()->getPdo();
            $currency = session()->get('currency', 'USD');
            $currency_info = session()->get('currency_info');
            if ($currency_info) {
                $currency = $currency_info['code'];
            }
            $currency = $currency ? $currency : 'USD';
            $currency_info = \App\Models\Currency::where('code', $currency)->first();
            if ($currency_info) {
                session()->put('currency', $currency);
                session()->put('currency_info', $currency_info);
            } else {
                session()->put('currency', 'USD');
                session()->put('currency_info', \App\Models\Currency::where('code', 'USD')->first());
            }
            
            return $next($request);
        } catch (\Throwable $th) {
            return $next($request);
        }
    }
}

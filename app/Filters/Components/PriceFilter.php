<?php

namespace App\Filters\Components;

class PriceFilter
{
    public function handle($content, $next)
    {
        if (!request()->has('price')) {
            return $next($content);
        }

        return $content->where('price', '>=', request('price'));
    }
}

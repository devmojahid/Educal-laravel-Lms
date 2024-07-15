<?php

namespace App\Filters\Components;

class SortFilter
{
    public function handle($content, $next)
    {
        if (!request()->has('sort')) {
            return $next($content);
        }

        return $content->orderBy('price', request('sort'));
    }
}

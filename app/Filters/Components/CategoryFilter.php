<?php

namespace App\Filters\Components;

class CategoryFilter
{
    public function handle($content, $next)
    {
        if (!request()->has('category')) {
            return $next($content);
        }

        return $content->whereHas('categories', function ($query) {
            $query->where('slug', request('category'));
        });
    }
}

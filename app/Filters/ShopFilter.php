<?php

namespace App\Filters;

use App\Filters\Components\CategoryFilter;
use App\Filters\Components\PriceFilter;
use App\Filters\Components\SortFilter;

class ShopFilter extends BaseFilter
{
    protected function getFilters(): array
    {
        return [
            'category' => CategoryFilter::class,
            'price' => PriceFilter::class,
            'sort' => SortFilter::class,
        ];
    }
}

<?php

namespace App\Filters;

use Illuminate\Pipeline\Pipeline;

abstract class BaseFilter
{
    abstract protected function getFilters(): array;

    public function getResults($content)
    {
        $results = app(Pipeline::class)
            ->send($content)
            ->through($this->getFilters())
            ->thenReturn();

        return $results;
    }
}

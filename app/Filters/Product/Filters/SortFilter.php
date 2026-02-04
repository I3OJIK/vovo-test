<?php

namespace App\Filters\Product\Filters;

use App\Enums\ProductSort;
use Illuminate\Database\Eloquent\Builder;

class SortFilter
{
    public function apply(Builder $query, string $value): Builder
    {
        $sort = ProductSort::from($value);
        [$field, $direction] = $sort->getFieldAndDirection();
        return $query->orderBy($field, $direction);
    }
}
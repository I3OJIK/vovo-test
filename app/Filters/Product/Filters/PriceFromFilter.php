<?php

namespace App\Filters\Product\Filters;

use Illuminate\Database\Eloquent\Builder;

class PriceFromFilter 
{
    /**
     * Сортировка по цене (мин цена)
     * 
     * @param Builder<Product> $query
     * @param mixed $minPrice
     * 
     * @return Builder
     */
    public function apply(Builder $query, mixed $minPrice): Builder
    {
        $query = $query->where('price', '>=', $minPrice);
        return $query;
    }
}
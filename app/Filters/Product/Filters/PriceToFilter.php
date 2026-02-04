<?php

namespace App\Filters\Product\Filters;

use Illuminate\Database\Eloquent\Builder;

class PriceToFilter 
{
    /**
     * Сортировка по цене (макс цена)
     * 
     * @param Builder<Product> $query
     * @param mixed $maxPrice
     * 
     * @return Builder
     */
    public function apply(Builder $query, mixed $maxPrice): Builder
    {
        $query = $query->where('price', '<=', $maxPrice);
        return $query;
    }
}
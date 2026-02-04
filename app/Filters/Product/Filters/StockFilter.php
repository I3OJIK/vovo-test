<?php

namespace App\Filters\Product\Filters;

use Illuminate\Database\Eloquent\Builder;

class StockFilter 
{
    /**
     * Сортировка по остаткам
     * 
     * @param Builder<Product> $query
     * @param bool $inStock
     * 
     * @return Builder
     */
    public function apply(Builder $query, bool $inStock): Builder
    {
        $query = $query->where('in_stock', $inStock);
        return $query;
    }
}
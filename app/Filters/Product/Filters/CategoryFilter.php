<?php

namespace App\Filters\Product\Filters;

use Illuminate\Database\Eloquent\Builder;

class CategoryFilter
{
    /**
     * Сортировка по категории
     * 
     * @param Builder $query
     * @param int $categoryId
     * 
     * @return Builder
     */
    public function apply(Builder $query, int $categoryId): Builder
    {
        return $query->where('category_id', $categoryId);
    }
}
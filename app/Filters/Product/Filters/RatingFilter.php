<?php

namespace App\Filters\Product\Filters;

use Illuminate\Database\Eloquent\Builder;

class RatingFilter
{
    /**
     * Фильтрация по rating
     * 
     * @param Builder $query
     * @param float $rating
     * 
     * @return Builder
     */
    public function apply(Builder $query, float $rating): Builder
    {
        return $query->where('rating', '>=', $rating);
    }
}
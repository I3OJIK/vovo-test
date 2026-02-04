<?php

namespace App\Filters\Product\Filters;

use Illuminate\Database\Eloquent\Builder;

class SearchFilter
{
    /**
     * Поиск по name
     * 
     * @param Builder $query
     * @param string $searchTerm
     * 
     * @return Builder
     */
    public function apply(Builder $query, string $searchTerm): Builder
    {
        return $query->where('name', 'LIKE', "%{$searchTerm}%");
    }
}
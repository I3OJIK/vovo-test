<?php

namespace App\Filters\Product;

use App\Filters\Abstracts\BaseFilter;
use App\Filters\Product\Filters\CategoryFilter;
use App\Filters\Product\Filters\SortFilter;

class ProductFilter extends BaseFilter
{
    protected array $filters = [
        'category_id' => CategoryFilter::class,
        'sort' => SortFilter::class,
    ];


}
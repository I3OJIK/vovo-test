<?php

namespace App\Filters\Product;

use App\Filters\Abstracts\BaseFilter;
use App\Filters\Product\Filters\CategoryFilter;
use App\Filters\Product\Filters\PriceFromFilter;
use App\Filters\Product\Filters\PriceToFilter;
use App\Filters\Product\Filters\RatingFilter;
use App\Filters\Product\Filters\SearchFilter;
use App\Filters\Product\Filters\SortFilter;
use App\Filters\Product\Filters\StockFilter;

class ProductFilter extends BaseFilter
{
    protected array $filters = [
        'category_id' => CategoryFilter::class,
        'q' => SearchFilter::class,
        'rating_from' => RatingFilter::class,
        'price_from' => PriceFromFilter::class,
        'price_to' => PriceToFilter::class,
        'in_stock' => StockFilter::class,
        'sort' => SortFilter::class,
    ];


}
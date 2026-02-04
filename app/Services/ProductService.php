<?php

namespace App\Services;

use App\Data\Requests\Product\ProductRequestData;
use App\Filters\Product\ProductFilter;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{

    public function __construct(
        private ProductFilter $productFilter
    )
    {}
    /**
     * Вывод продуктов с пагинацией и фильтраицей
     * 
     * @param ProductFilterData $data
     * @param BaseProductFilter $filter
     * 
     * @return LengthAwarePaginator
     */
    public function getProducts(ProductRequestData $data): LengthAwarePaginator
    {
        $query = Product::query()->with('category');

        $this->productFilter->apply($query, $data->toArray());

        return $query->paginate($data->perPage);
    }
}
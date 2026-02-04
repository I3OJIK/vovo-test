<?php

namespace App\Http\Controllers;

use App\Data\Requests\Product\ProductRequestData;
use App\Data\Responses\Product\ProductResponseData;
use App\Services\ProductService;
use Spatie\LaravelData\PaginatedDataCollection;

class ProductController extends Controller
{
    public function __construct(
        private ProductService $productService
    ) {}

    public function index(ProductRequestData $data): PaginatedDataCollection
    {
        $products = $this->productService->getProducts($data);

        return ProductResponseData::collect($products, PaginatedDataCollection::class);
    }
}

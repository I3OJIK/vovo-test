<?php

namespace App\Http\Controllers;

use App\Data\Responses\Product\ProductResponseData;
use App\Models\Product;
use Spatie\LaravelData\PaginatedDataCollection;

class ProductController extends Controller
{
    public function index(): PaginatedDataCollection
    {
        $query = Product::query()->with(['category']);
        
        $products = $query->paginate();
        return ProductResponseData::collect($products, PaginatedDataCollection::class);
    }
}
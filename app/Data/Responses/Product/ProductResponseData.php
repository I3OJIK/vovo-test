<?php

namespace App\Data\Responses\Product;

use Spatie\LaravelData\Data;
use App\Models\Product;

class ProductResponseData extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public float $price,
        public int $categoryId,       
        public bool $inStock,         
        public float $rating,
        public ?string $createdAt,      
        public ?string $updatedAt,
        public array $category,
    ) {}
    
    public static function fromModel(Product $product): self
    {
        return new self(
            id: $product->id,
            name: $product->name,
            price: $product->price,
            categoryId: $product->category_id,
            inStock: $product->in_stock,
            rating: $product->rating,
            createdAt: $product->created_at,
            updatedAt: $product->updated_at,
            category: [
                'id' => $product->category->id,
                'name' => $product->category->name,
            ]
        );
    }
}
<?php

namespace App\Data\Requests\Product;

use App\Enums\ProductSort;
use Spatie\LaravelData\Attributes\Validation\BooleanType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Enum;
use Spatie\LaravelData\Attributes\Validation\Rule as ValidationRule;
use Spatie\LaravelData\Attributes\WithCast;

class ProductRequestData extends Data
{
    public function __construct(
        public ?string $q,
        
        #[Min(0)]
        public ?float $priceFrom,
        
        #[Min(0)]
        public ?float $priceTo,
        
        #[Exists('categories', 'id')]
        public ?int $categoryId,
        
        #[BooleanType]
        public ?bool $inStock,
        
        #[Min(0)]
        #[Max(5)]
        #[ValidationRule(['decimal:1'])]
        public ?float $ratingFrom,
        
        #[Enum(ProductSort::class)]
        public ?string $sort,
        
        #[Min(1)]
        #[Max(100)]
        public int $perPage = 15,
        
        #[Min(1)]
        public int $page = 1,
    ) {}
    
}
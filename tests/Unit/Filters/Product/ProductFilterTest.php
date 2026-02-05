<?php

namespace Tests\Unit\Filters;

use App\Filters\Product\ProductFilter;
use PHPUnit\Framework\Attributes\Test;
use Tests\Unit\Filters\Product\FilterTestCase;

class ProductFilterTest extends FilterTestCase
{
    #[Test]
    /**
     * применяет все условия
     */
    public function it_applies_all_filters()
    {
        $filter = new ProductFilter();

        $this->builder->shouldReceive('where')
            ->once()->with('name', 'LIKE', '%iphone%')
            ->andReturnSelf();
        $this->builder->shouldReceive('where')
            ->once()->with('category_id', 1)
            ->andReturnSelf();
        $this->builder->shouldReceive('where')
            ->once()->with('price', '>=', 1000.50)
            ->andReturnSelf();
        $this->builder->shouldReceive('where')
            ->once()->with('price', '<=', 50000.00)
            ->andReturnSelf();
        $this->builder->shouldReceive('where')
            ->once()->with('in_stock', true)
            ->andReturnSelf();
        $this->builder->shouldReceive('where')
            ->once()->with('rating', '>=', 4.0)
            ->andReturnSelf();
        $this->builder->shouldReceive('orderBy')
            ->once()->with('price', 'asc')
            ->andReturnSelf();
        
        $result = $filter->apply($this->builder, [
            'q' => 'iphone',
            'category_id' => 1,
            'price_from' => 1000.50,
            'price_to' => 50000.00,
            'in_stock' => true,
            'rating_from' => 4.0,
            'sort' => 'price_asc',
        ]);
        $this->assertSame($this->builder, $result);
    }
    
    #[Test]
    /**
     * игнорирует пустые или null  значения
     */
    public function it_ignores_empty_null_and_invalid_values()
    {
        $filter = new ProductFilter();
        
        $this->builder->shouldReceive('where')
            ->once()->with('category_id', 5)
            ->andReturnSelf();
        $this->builder->shouldReceive('orderBy')
            ->once()->with('created_at', 'desc')
            ->andReturnSelf();
        
        $result = $filter->apply($this->builder, [
            'category_id' => 5,
            'q' => '', 
            'price_from' => null,
            'sort' => 'newest', 
        ]);
        
        $this->assertSame($this->builder, $result);
    }
}
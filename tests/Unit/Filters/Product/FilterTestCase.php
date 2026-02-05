<?php

namespace Tests\Unit\Filters\Product;

use Tests\TestCase;
use Mockery;
use Illuminate\Database\Eloquent\Builder;
use Mockery\MockInterface;

abstract class FilterTestCase extends TestCase
{
    protected Builder|MockInterface $builder;

    protected function setUp(): void
    {
        parent::setUp();
        $this->builder = Mockery::mock(Builder::class);
    }

    /**
     * Очистка после каждого теста
     */
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    
}
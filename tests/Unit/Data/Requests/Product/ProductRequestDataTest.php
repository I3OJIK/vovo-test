<?php

namespace Tests\Unit\Data\Requests\Product;

use Tests\TestCase;
use App\Data\Requests\Product\ProductRequestData;
use PHPUnit\Framework\Attributes\Test;

class ProductRequestDataTest extends TestCase
{
    #[Test]
    /**
     * объект создается из массива с валидными данными
     */
    public function it_creates_from_array_with_valid_data()
    {
        $inputData = [
            'q' => 'test product',
            'price_from' => 100.50,
            'price_to' => 500.75,
            'category_id' => 1,
            'in_stock' => true,
            'rating_from' => 4.5,
            'sort' => 'price_asc',
            'per_page' => 20,
        ];

        $data = ProductRequestData::validateAndCreate($inputData);

        $this->assertInstanceOf(ProductRequestData::class, $data);
        $this->assertEquals('test product', $data->q);
        $this->assertEquals(100.50, $data->priceFrom);
        $this->assertEquals(500.75, $data->priceTo);
        $this->assertEquals(4.5, $data->ratingFrom);
        $this->assertEquals(true, $data->inStock);
        $this->assertEquals('price_asc', $data->sort);
        $this->assertEquals(1, $data->categoryId);
        $this->assertEquals(20, $data->perPage);
    }

    #[Test]
    /**
     * Устанавливаются значения по умолчанию при пустом вводе
     */
    public function it_sets_default_values_when_empty()
    {
        $data = ProductRequestData::validateAndCreate([]);

        $this->assertNull($data->q);
        $this->assertNull($data->priceFrom);
        $this->assertNull($data->categoryId);
    }

    #[Test]
    /**
     * Отклоняет невалидное значение сортировки
     */
    public function it_rejects_invalid_sort_value()
    {
        $this->expectException(\Illuminate\Validation\ValidationException::class);

        ProductRequestData::validateAndCreate(['sort' => 'invalid_sort_value']);
    }

    #[Test]
    /**
     * Валидирует минимальное значение рейтинга
     */
    public function it_validates_rating_min_value()
    {
        $this->expectException(\Illuminate\Validation\ValidationException::class);

        ProductRequestData::validateAndCreate(['rating_from' => -1.0]);
    }

    #[Test]
    /**
     * Валидирует максимальное значение рейтинга
     */
    public function it_validates_rating_max_value()
    {
        $this->expectException(\Illuminate\Validation\ValidationException::class);

        ProductRequestData::validateAndCreate(['rating_from' => 5.5]);
    }

    #[Test]
    /**
     * Валидирует минимальное значение цены
     */
    public function it_validates_price_from_min_value()
    {
        $this->expectException(\Illuminate\Validation\ValidationException::class);

        ProductRequestData::validateAndCreate(['price_from' => -100]);
    }

    #[Test]
    /**
     * Валидирует диапазон per_page
     */
    public function it_validates_per_page_range()
    {
        // Проверка значения меньше минимума
        $this->expectException(\Illuminate\Validation\ValidationException::class);
        ProductRequestData::validateAndCreate(['per_page' => 0]);

        // Проверка значения больше максимума
        $this->expectException(\Illuminate\Validation\ValidationException::class);
        ProductRequestData::validateAndCreate(['per_page' => 101]);
    }
}

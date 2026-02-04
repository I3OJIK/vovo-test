<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int            $id             Уникальный идентификатор товара
 * @property string         $name           Название товара
 * @property float          $price          Цена товара
 * @property int            $category_id    ID категории товара
 * @property bool           $in_stock       Наличие товара на складе
 * @property float          $rating         Рейтинг товара от 0 до 5
 * @property Carbon|null    $created_at     Дата создания
 * @property Carbon|null    $updated_at     Дата обновления
 * 
 * @property-read Category  $category       Категория товара
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'category_id',
        'in_stock',
        'rating',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'in_stock' => 'boolean',
        'rating' => 'decimal:1',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Категория товара
     * 
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}

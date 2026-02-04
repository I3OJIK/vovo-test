<?php

namespace App\Enums;

enum ProductSort: string
{
    case PRICE_ASC = 'price_asc';
    case PRICE_DESC = 'price_desc';
    case RATING_DESC = 'rating_desc';
    case NEWEST = 'newest';
    
    /**
     * Получить поле и направление сортировки
     * 
     * @return array
     */
    public function getFieldAndDirection(): array
    {
        return match($this) {
            self::PRICE_ASC => ['price', 'asc'],
            self::PRICE_DESC => ['price', 'desc'],
            self::RATING_DESC => ['rating', 'desc'],
            self::NEWEST => ['created_at', 'desc'],
        };
    }
    
    /**
     * Проверить, является ли значением enum
     */
    public static function isValid(string $value): bool
    {
        return !empty(self::tryFrom($value));
    }
    
    /**
     * Все возможные значения
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
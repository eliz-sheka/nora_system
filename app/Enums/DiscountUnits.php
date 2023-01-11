<?php

namespace App\Enums;

enum DiscountUnits: string
{
    case PERCENT = '%';
    case UAH = 'грн';

    /**
     * @return array
     */
    public static function getValues(): array
    {
        return [
            self::PERCENT->value,
            self::UAH->value,
        ];
    }
}

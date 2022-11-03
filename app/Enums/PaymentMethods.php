<?php

namespace App\Enums;

enum PaymentMethods: int
{
    case CARD = 1;
    case CASH = 2;

    /**
     * @return string[]
     */
    public static function getMappedNames(): array
    {
        return [
            self::CARD->value => 'Оплата карткою',
            self::CASH->value => 'Оплата готівкою',
        ];
    }

    /**
     * @return array
     */
    public static function getValues(): array
    {
        return [
            self::CARD->value,
            self::CASH->value,
        ];
    }

    /**
     * @param int|null $value
     * @return string
     */
    public static function getMappedNameByValue(?int $value): string
    {
        $values = self::getMappedNames();

        return $values[$value] ?? 'Не вказано';
    }
}

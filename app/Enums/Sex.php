<?php

namespace App\Enums;

enum Sex: int
{
    case FEMALE = 1;
    case MALE = 2;
    case OTHER = 3;
    case NOT_SPECIFIED = 4;

    /**
     * @return string[]
     */
    public static function getMappedNames(): array
    {
        return [
            self::FEMALE->value => 'Жіноча',
            self::MALE->value => 'Чоловіча',
            self::OTHER->value => 'Інша',
            self::NOT_SPECIFIED->value => 'Не хочу вказувати',
        ];
    }

    /**
     * @return array
     */
    public static function getValues(): array
    {
        return [
            self::FEMALE->value,
            self::MALE->value,
            self::OTHER->value,
            self::NOT_SPECIFIED->value,
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

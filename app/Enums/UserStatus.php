<?php

namespace App\Enums;

enum UserStatus: int
{
    case ACTIVE = 1;
    case BLOCKED = 2;

    /**
     * @return string[]
     */
    public static function getMappedNames(): array
    {
        return [
            self::ACTIVE->value => 'Active',
            self::BLOCKED->value => 'Blocked',
        ];
    }

    /**
     * @return array
     */
    public static function getValues(): array
    {
        return [
            self::ACTIVE->value,
            self::BLOCKED->value,
        ];
    }

    /**
     * @param int|null $value
     * @return string
     */
    public static function getMappedNameByValue(?int $value): string
    {
        $values = self::getMappedNames();

        return $values[$value] ?? $values[self::ACTIVE->value];
    }
}

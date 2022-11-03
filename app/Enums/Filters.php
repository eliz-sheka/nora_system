<?php

namespace App\Enums;

enum Filters: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case DELETED = 'deleted';
    case ALL = 'all';
    case EXCEPT_DELETED = 'except_deleted';
    case UNPAID = 'unpaid';
    case WITH_NOTES = 'with_notes';

    /**
     * @return string[]
     */
    public static function getMappedNames(): array
    {
        return [
            self::ACTIVE->value => 'Активні',
            self::INACTIVE->value => 'Неактивні',
            self::DELETED->value => 'Видалені',
            self::ALL->value => 'Всі',
            self::EXCEPT_DELETED->value => 'Окрім видалених',
            self::UNPAID->value => 'Неоплачені',
            self::WITH_NOTES->value => 'З нотатками',
        ];
    }

    /**
     * @param string $value
     * @return string
     */
    public static function getNameByValue(string $value): string
    {
        $names = self::getMappedNames();

        return $names[$value] ?? '-';
    }
}

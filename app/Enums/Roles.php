<?php

namespace App\Enums;

enum Roles: string
{
    case ADMIN = 'admin';
    case MANAGER = 'manager';
    case USER = 'user';

    /**
     * @return array
     */
    public static function getValues(): array
    {
        return [
            self::ADMIN->value,
            self::MANAGER->value,
            self::USER->value,
        ];
    }

    /**
     * @return array
     */
    public static function getManagementRoles(): array
    {
        return [
            self::ADMIN->value,
            self::MANAGER->value,
        ];
    }
}

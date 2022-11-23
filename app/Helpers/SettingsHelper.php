<?php

namespace App\Helpers;

use App\Models\Settings;

class SettingsHelper
{
    /**
     * @return int|float
     */
    public static function getPricePerHour(): int|float
    {
        $settings = Settings::query()->value('data');
        $settings = json_decode($settings ?? '', true);

        return $settings['uah_per_hour'] ?? 50;
    }
}

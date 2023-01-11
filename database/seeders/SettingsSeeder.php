<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        Settings::query()->create(['data' => ['uah_per_hour' => 60]]);
    }
}

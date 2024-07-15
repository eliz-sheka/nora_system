<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        $this->call([
            SettingsSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            TestUserSeeder::class,
            TestLabelSeeder::class,
            TestDiscountSeeder::class,
            TestVisitTypeSeeder::class,
            TestVisitSeeder::class,
        ]);
    }
}

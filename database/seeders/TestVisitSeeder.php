<?php

namespace Database\Seeders;

use App\Models\Visit;
use Illuminate\Database\Seeder;

class TestVisitSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        Visit::factory(20)->oldClosed()->create();
        Visit::factory(10)->freshClosed()->create();
        Visit::factory(10)->fresh()->create();
    }
}

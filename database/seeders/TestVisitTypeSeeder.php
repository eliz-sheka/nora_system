<?php

namespace Database\Seeders;

use App\Models\VisitType;
use Illuminate\Database\Seeder;

class TestVisitTypeSeeder extends Seeder
{
    public function run(): void
    {
        VisitType::factory(4)->create();
    }
}

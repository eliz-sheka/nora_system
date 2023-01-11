<?php

namespace Database\Seeders;

use App\Models\Label;
use Illuminate\Database\Seeder;

class TestLabelSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        Label::factory(10)->create();
    }
}

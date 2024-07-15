<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Seeder;

class TestDiscountSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        Discount::factory(2)->create();
//        Discount::factory(2)->withDateActive()->create();
//        Discount::factory(2)->withDateInactive()->create();
//        Discount::factory(2)->withQuantity()->create();
    }
}

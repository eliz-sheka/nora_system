<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Seeder;

class DiscountsSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'День народження',
                'description' => '',
                'amount' => '100',
                'unit' => '%',
            ],
            [
                'name' => 'Донорство',
                'description' => '',
                'amount' => '50',
                'unit' => '%',
            ],
            [
                'name' => 'Сертифікат',
                'description' => '',
                'amount' => '10',
                'unit' => '%',
            ],
            [
                'name' => 'Сертифікат',
                'description' => '',
                'amount' => '20',
                'unit' => '%',
            ],
            [
                'name' => 'Сертифікат',
                'description' => '',
                'amount' => '50',
                'unit' => '%',
            ],
            [
                'name' => 'Сертифікат',
                'description' => '',
                'amount' => '100',
                'unit' => '%',
            ],
            [
                'name' => 'Сертифікат Еверест',
                'description' => '',
                'amount' => '100',
                'unit' => '%',
            ],
        ];

        foreach ($data as $d) {
            Discount::query()->create($d);
        }
    }
}

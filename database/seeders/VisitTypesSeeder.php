<?php

namespace Database\Seeders;

use App\Models\VisitType;
use Illuminate\Database\Seeder;

class VisitTypesSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'description' => 'Звичайне відвідування',
            ],
            [
                'description' => 'Книжковий клуб',
                'price' => 120,
            ],
            [
                'description' => 'D&D',
                'price' => 400,
            ],
        ];

        foreach ($data as $datum) {
            VisitType::query()->create($datum);
        }
    }
}

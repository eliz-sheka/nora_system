<?php

namespace Database\Seeders;

use App\Models\Label;
use Illuminate\Database\Seeder;

class LabelsSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        $labels = [
            'Гірлянда',
            'Гітара',
            'Годинник',
            'Джойстик',
            'Капуста',
            'Карти',
            'Кленовий лист',
            'Книжки',
            'Кролик',
            'Кролики',
            'Кубики',
            'Кубик-Рубіка',
            'Лампочка',
            'Лисички',
            'Листочок',
            'Міпл',
            'Морква',
            'Мухомор',
            'Пазл',
            'Палітра',
            'Пензлики',
            'Печиво',
            'Соняшник',
            'Чай',
        ];

        foreach ($labels as $label) {
            Label::query()->create(['name' => $label]);
        }
    }
}

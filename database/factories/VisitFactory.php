<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VisitFactory extends Factory
{
    /**
     * @return array|mixed[]
     */
    public function definition(): array
    {
        $notes = [null, fake()->sentence];

        return [
            'note' => $notes[rand(0, count($notes) - 1)],
        ];
    }
}

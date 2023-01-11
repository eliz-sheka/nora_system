<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LabelFactory extends Factory
{
    /**
     * @return array|mixed[]
     */
    public function definition(): array
    {
        return [
            'name' => ucfirst(fake()->word()),
        ];
    }
}

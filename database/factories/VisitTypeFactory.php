<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VisitTypeFactory extends Factory
{
    /**
     * @return array|mixed[]
     */
    public function definition(): array
    {
        $prices = [null, rand(120, 400), rand(120, 400), rand(120, 400)];

        return [
            'description' => fake()->sentence,
            'price' => $prices[rand(0, count($prices) - 1)]
        ];
    }
}

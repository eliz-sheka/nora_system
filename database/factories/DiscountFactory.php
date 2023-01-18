<?php

namespace Database\Factories;

use App\Enums\DiscountUnits;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiscountFactory extends Factory
{
    /**
     * @return array|mixed[]
     */
    public function definition(): array
    {
        $units = DiscountUnits::getValues();
        $amount = [10, 20, 30, 40, 50];

        return [
            'name' => ucfirst(fake()->sentence(3)),
            'description' => ucfirst(fake()->sentence),
            'amount' => $amount[rand(0, count($amount) - 1)],
            'unit' => $units[rand(0, count($units) - 1)],
            'quantity' => null,
            'active_from' => null,
            'active_till' => null,
        ];
    }

    /**
     * @return \Database\Factories\DiscountFactory
     */
    public function withDateActive(): DiscountFactory
    {
        return $this->state(function (array $attributes) {
            $dates = [now(), now()->addDays('-5'), now()->addDays('-2')];
            $fromDate = $dates[rand(0, count($dates) - 1)];

            return [
                'active_from' => $fromDate,
                'active_till' => $fromDate->addDays(30),
            ];
        });
    }

    /**
     * @return \Database\Factories\DiscountFactory
     */
    public function withDateInactive(): DiscountFactory
    {
        return $this->state(function (array $attributes) {
            $dates = [now()->addDays('-5'), now()->addDays('-3'), now()->addDays('-20'), now()->addDays('-10')];
            $fromDate = $dates[rand(0, count($dates) - 1)];

            return [
                'active_from' => $fromDate,
                'active_till' => $fromDate->addDays('2'),
            ];
        });
    }

    /**
     * @return \Database\Factories\DiscountFactory
     */
    public function withQuantity(): DiscountFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'quantity' => rand(1, 50),
            ];
        });
    }
}

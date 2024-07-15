<?php

namespace Database\Seeders;

use App\Models\Label;
use App\Models\Visit;
use App\Models\Visitor;
use App\Models\VisitType;
use Illuminate\Database\Seeder;

class TestVisitSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        $labels = Label::query()->get();
        $visitTypes = VisitType::query()->get();
        $index = 1;

        $labels->each(function (Label $label) use ($labels, &$index, $visitTypes) {
            if ($labels->count() - $index <= 3) {
                if (rand(0, 1)) {
                    $startTime = now()->setHour(rand(10, 20))->setMinute(rand(0, 59));

                    // Add fresh closed visits
                    Visit::factory(1)
                        ->state(['start_time' => $startTime, 'is_active' => false])
                        ->has(
                            Visitor::factory()
                                ->state([
                                    'start_time' => $startTime,
                                    'end_time' => $startTime->clone()->addHours(rand(1, 4))->setMinute(rand(0, 59)),
                                ])
                                ->count(rand(1, 6))
                        )
                        ->for($label)
                        ->for($visitTypes->random(1)->first())
                        ->create();
                }

                if (rand(0, 1)) {
                    $startTime = now()->addDays(rand(-10, -1))->setHour(rand(10, 20))->setMinute(rand(0, 59));

                    // Add old closed visits
                    Visit::factory(3)
                        ->state(['start_time' => $startTime, 'is_active' => false])
                        ->has(
                            Visitor::factory()
                                ->state([
                                    'start_time' => $startTime,
                                    'end_time' => $startTime->clone()->addHours(rand(1, 4))->setMinute(rand(0, 59)),
                                ])
                                ->count(rand(1, 6))
                        )
                        ->for($label)
                        ->for($visitTypes->random(1)->first())
                        ->create();
                }

                return false;
            }

            $startTime = now()->setHour(rand(10, 20))->setMinute(rand(0, 59));

            Visit::factory(1)
                ->state(['start_time' => $startTime])
                ->has(Visitor::factory()->fresh()->state(['start_time' => $startTime])->count(rand(1, 6)))
                ->for($label)
                ->for($visitTypes->random(1)->first())
                ->create();

            if (rand(0, 1)) {
                $startTime = now()->setHour(rand(10, 20))->setMinute(rand(0, 59));

                // Add fresh closed visits
                Visit::factory(1)
                    ->state(['start_time' => $startTime, 'is_active' => false])
                    ->has(
                        Visitor::factory()
                            ->state([
                                'start_time' => $startTime,
                                'end_time' => $startTime->clone()->addHours(rand(1, 4))->setMinute(rand(0, 59)),
                            ])
                            ->count(rand(1, 6))
                    )
                    ->for($label)
                    ->for($visitTypes->random(1)->first())
                    ->create();
            }

            if (rand(0, 1)) {
                $startTime = now()->addDays(rand(-10, -1))->setHour(rand(10, 20))->setMinute(rand(0, 59));

                // Add old closed visits
                Visit::factory(3)
                    ->state(['start_time' => $startTime, 'is_active' => false])
                    ->has(
                        Visitor::factory()
                            ->state([
                                'start_time' => $startTime,
                                'end_time' => $startTime->clone()->addHours(rand(1, 4))->setMinute(rand(0, 59)),
                            ])
                            ->count(rand(1, 6))
                    )
                    ->for($label)
                    ->for($visitTypes->random(1)->first())
                    ->create();
            }

            $index++;

            return true;
        });
    }
}

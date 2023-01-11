<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class TestUserSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        $users = User::factory(4)->create();

        /** @var User $user */
        foreach ($users as $user) {
            $user->assignManagerRole();
        }
    }
}

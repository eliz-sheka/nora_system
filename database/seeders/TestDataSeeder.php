<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
        ]);

        $users = User::factory(4)->create();

        /** @var User $user */
        foreach ($users as $user) {
            $user->assignManagerRole();
        }
    }
}

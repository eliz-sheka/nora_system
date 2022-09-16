<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var User $user */
        $user = User::query()->create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'phone' => '0661111111',
            'email' => 'admin@nora.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);

        $user->assignAdminRole();
    }
}

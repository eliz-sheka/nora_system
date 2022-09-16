<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $roles = [
            'user' => 'Користувач',
            'manager' => 'Менеджер',
            'admin' => 'Адміністратор',
        ];

        foreach ($roles as $slug => $roleName) {
            Role::query()->create([
                'slug' => $slug,
                'name' => $roleName,
            ]);
        }
    }
}

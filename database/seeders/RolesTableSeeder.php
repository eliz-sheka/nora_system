<?php

namespace Database\Seeders;

use App\Enums\Roles;
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
            Roles::ADMIN->value => 'Адміністратор',
            Roles::MANAGER->value => 'Менеджер',
            Roles::USER->value => 'Користувач',
        ];

        foreach ($roles as $slug => $roleName) {
            Role::query()->create([
                'slug' => $slug,
                'name' => $roleName,
            ]);
        }
    }
}

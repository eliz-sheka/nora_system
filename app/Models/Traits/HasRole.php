<?php

namespace App\Models\Traits;

use App\Repositories\RoleRepository;

trait HasRole
{
    /**
     * @param string $roleName
     * @return void
     */
    public function assignRole(string $roleName): void
    {
        $role = (new RoleRepository())->getRoleByName($roleName);
        $this->roles()->attach($role);
    }

    /**
     * @return void
     */
    public function assignAdminRole(): void
    {
        $this->assignRole('admin');
    }

    /**
     * @return void
     */
    public function assignUserRole(): void
    {
        $this->assignRole('user');
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return (bool) $this->roles()->where('roles.name', 'admin')->first(['roles.id']);
    }
}
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
        return $this->hasRole('admin');
    }

    /**
     * @param string|array $name
     * @return bool
     */
    public function hasRole(string|array $name): bool
    {
        if (is_array($name)) {
            return (bool) $this->roles()->whereIn('roles.name', $name)->first(['roles.id']);
        }

        return (bool) $this->roles()->where('roles.name', $name)->first(['roles.id']);
    }
}

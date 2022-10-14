<?php

namespace App\Models\Traits;

use App\Enums\Roles;
use App\Repositories\RoleRepository;

trait HasRole
{
    /**
     * @param string $roleSlug
     * @return void
     */
    public function assignRole(string $roleSlug): void
    {
        $role = (new RoleRepository())->getRoleBySlug($roleSlug);
        $this->roles()->attach($role);
    }

    /**
     * @return void
     */
    public function assignAdminRole(): void
    {
        $this->assignRole(Roles::ADMIN->value);
    }

    /**
     * @return void
     */
    public function assignUserRole(): void
    {
        $this->assignRole(Roles::USER->value);
    }

    /**
     * @return void
     */
    public function assignManagerRole(): void
    {
        $this->assignRole(Roles::MANAGER->value);
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->hasRole(Roles::ADMIN->value);
    }

    /**
     * @param string|array $slug
     * @return bool
     */
    public function hasRole(string|array $slug): bool
    {
        if (is_array($slug)) {
            return (bool) $this->roles()->whereIn('roles.slug', $slug)->first(['roles.id']);
        }

        return (bool) $this->roles()->where('roles.slug', $slug)->first(['roles.id']);
    }

    /**
     * @param string $newRoleSlug
     * @return void
     */
    public function replaceRole(string $newRoleSlug): void
    {
        $this->roles()->detach();
        $this->assignRole($newRoleSlug);
    }
}

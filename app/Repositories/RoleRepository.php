<?php

namespace App\Repositories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class RoleRepository
{
    /**
     * @param string $roleName
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getRoleBySlug(string $roleName): Model|Builder|null
    {
        return Role::query()->where('slug', $roleName)->firstOrFail();
    }

    /**
     * @return \Illuminate\Support\Collection|null
     */
    public function list(): ?Collection
    {
        return Role::query()->get();
    }
}

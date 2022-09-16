<?php

namespace App\Repositories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class RoleRepository
{
    /**
     * @param string $roleName
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getRoleByName(string $roleName): Model|Builder|null
    {
        return Role::query()->where('name', $roleName)->firstOrFail();
    }
}

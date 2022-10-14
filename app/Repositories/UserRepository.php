<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserRepository
{
    /**
     * @param bool $deleted
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginateWithRoles(bool $deleted = false): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $query = User::query()->with('roles');

        if ($deleted) {
            $query->onlyTrashed();
        }

        return $query->paginate(15, ['users.*']);
    }

    /**
     * @param array $data
     * @return \App\Models\User
     */
    public function create(array $data): User
    {
        /** @var \App\Models\User $user */
        $user = User::query()->create($data);
        $user->assignRole($data['role']);

        return $user;
    }

    /**
     * @param \App\Models\User $user
     * @param array $data
     * @return \App\Models\User
     */
    public function update(User $user, array $data): User
    {
        $user->update($data);

        if ($user->getAttribute('role_slug') !== $data['role']) {
            $user->replaceRole($data['role']);
        }

        return $user;
    }

    public function checkIfManagementByEmail(string $email): bool
    {
        return (bool) User::query()->management()->where('users.email', $email)->first(['users.id']);
    }
}

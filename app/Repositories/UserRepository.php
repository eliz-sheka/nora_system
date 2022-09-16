<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return User::query()->regularUsers()->paginate(15, ['users.*']);
    }
}

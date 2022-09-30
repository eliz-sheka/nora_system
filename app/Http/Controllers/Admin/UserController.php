<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Contracts\View\View;

class UserController implements CRUDInterface
{
    public function list(): View
    {
//        $users = User::query()->with('roles')->paginate();

        return \view('admin.user.list', ['entities' => []]);
    }

    public function create(): View
    {

    }

    public function show(): View
    {

    }

    public function edit(): View
    {

    }

    public function save(): View
    {

    }

    public function update(): View
    {

    }

    public function delete(): View
    {

    }
}

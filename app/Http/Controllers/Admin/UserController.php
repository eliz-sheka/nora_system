<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Sex;
use App\Http\Requests\Admin\UserSaveRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\User;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController
{
    protected UserRepository $userRepository;
    protected RoleRepository $roleRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->roleRepository = new RoleRepository();
    }

    public function list(): View
    {
        $users = $this->userRepository->paginateWithRoles();

        return \view('admin.user.list', ['entities' => $users]);
    }

    public function deletedList(): View
    {
        $users = $this->userRepository->paginateWithRoles(true);

        return \view('admin.user.list', ['entities' => $users]);
    }

    public function create(): View
    {
        $roles = $this->roleRepository->list();

        return \view('admin.user.create', ['roles' => $roles, 'sex' => Sex::getMappedNames(),]);
    }

    public function show(User $user): View
    {
        return \view('admin.user.show', ['entity' => $user]);
    }

    public function edit(User $user): View
    {
        $roles = $this->roleRepository->list();

        return \view(
            'admin.user.edit',
            [
                'sex' => Sex::getMappedNames(),
                'roles' => $roles,
                'entity' => $user,
                'roleSlug' => $user->getAttribute('role_slug'),
            ]
        );
    }

    public function save(UserSaveRequest $request): RedirectResponse
    {
        $this->userRepository->create($request->validated());

        return redirect(route('admin.user.list'));
    }

    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        $this->userRepository->update($user, $request->validated());

        return redirect(route('admin.user.list'));
    }

    public function delete(User $user): RedirectResponse
    {
        $user->delete();

        return redirect(route('admin.user.list'));
    }

    public function forceDelete(User $user): RedirectResponse
    {
        $user->forceDelete();

        return redirect(route('admin.user.list'));
    }

    public function block(User $user): RedirectResponse
    {
        $this->userRepository->block($user);

        return redirect(route('admin.user.show', ['user' => $user]));
    }

    public function unblock(User $user): RedirectResponse
    {
        $this->userRepository->unblock($user);

        return redirect(route('admin.user.show', ['user' => $user]));
    }
}

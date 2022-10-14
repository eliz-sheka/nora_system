<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

interface CRUDInterface
{
    public function list(): View;

    public function create(): View;

    public function show(): View;

    public function edit(): View;

    public function save(): RedirectResponse;

    public function update(): View;

    public function delete(): View;
}

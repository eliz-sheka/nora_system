<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\View\View;

interface CRUDInterface
{
    public function list(): View;

    public function create(): View;

    public function show(): View;

    public function edit(): View;

    public function save(): View;

    public function update(): View;

    public function delete(): View;
}

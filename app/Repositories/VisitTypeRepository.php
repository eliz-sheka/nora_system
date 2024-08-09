<?php

namespace App\Repositories;

use App\Models\VisitType;
use Illuminate\Database\Eloquent\Collection;

class VisitTypeRepository
{
    public function list(): Collection
    {
        return VisitType::query()->get();
    }
}

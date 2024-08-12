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

    public function create(array $data): VisitType
    {
        /** @var VisitType */
        return VisitType::query()->create($data);
    }

    public function update(VisitType $visitType, array $data): bool
    {
        return $visitType->update($data);
    }

    public function delete(VisitType $visitType, bool $force = false): bool
    {
        return $force ? $visitType->forceDelete() : $visitType->delete();
    }
}

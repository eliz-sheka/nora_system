<?php

namespace App\Repositories;

use App\Models\Label;
use Illuminate\Database\Eloquent\Collection;

class LabelRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function list(bool $onlyDeleted = false): Collection|array
    {
        $query = Label::query();

        if ($onlyDeleted) {
            $query->onlyTrashed();
        }

        return $query->get();
    }

    /**
     * @param array $data
     * @return \App\Models\Label
     */
    public function create(array $data): Label
    {
        /** @var Label */
        return Label::query()->create($data);
    }

    /**
     * @param \App\Models\Label $label
     * @param array $data
     * @return bool
     */
    public function update(Label $label, array $data): bool
    {
        return $label->update($data);
    }

    /**
     * @param \App\Models\Label $label
     * @param bool $force
     * @return bool
     */
    public function delete(Label $label, bool $force = false): bool
    {
        return $force ? $label->forceDelete() : $label->delete();
    }
}

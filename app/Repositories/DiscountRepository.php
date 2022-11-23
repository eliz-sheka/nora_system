<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Discount;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DiscountRepository
{
    /**
     * @param string|null $filter
     * @return \Illuminate\Database\Eloquent\Collection|array
     */
    public function list(?string $filter): Collection|array
    {
        if (Discount::FILTER_INACTIVE === $filter) {
            return Discount::query()->where('active_till', '<', now())->get();
        } elseif (Discount::FILTER_DELETED === $filter) {
            return Discount::query()->onlyTrashed()->get();
        } elseif (Discount::FILTER_ALL === $filter) {
            return Discount::query()->withTrashed()->get();
        }

        return Discount::query()
            ->active()
            ->get();
    }

    /**
     * @param array $data
     * @return \App\Models\Discount|\Illuminate\Database\Eloquent\Model
     */
    public function create(array $data): Discount|Model
    {
        return Discount::query()->create($data);
    }

    /**
     * @param \App\Models\Discount $discount
     * @param array $data
     * @return bool
     */
    public function update(Discount $discount, array $data): bool
    {
        return $discount->update($data);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getFormatted(): Collection
    {
        return Discount::query()
            ->active()
            ->select('id', DB::raw("concat(name, ' ', amount, unit) as name"))
            ->get();
    }
}

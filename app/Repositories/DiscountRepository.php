<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Discount;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class DiscountRepository
{
    /**
     * @return LengthAwarePaginator
     */
    public function paginate(): LengthAwarePaginator
    {
        return Discount::query()->paginate();
    }

    /**
     * @param Discount $discount
     * @return Collection
     */
    public function getProductsByDiscount(Discount $discount): Collection
    {
        return $discount->products()->get();
    }
}

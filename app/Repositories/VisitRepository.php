<?php

namespace App\Repositories;

use App\Enums\Filters;
use App\Helpers\SettingsHelper;
use App\Models\Discount;
use App\Models\Label;
use App\Models\Visit;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class VisitRepository
{
    /**
     * @param string|null $filter
     * @param array|null $filterDate
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function groupListPaginate(string $filter = null, array $filterDate = null): LengthAwarePaginator
    {
        return $this->getQueryWithFilters($filter, $filterDate)
            ->select(['label_id', 'start_time', DB::raw('count(id) as visitors_amount')])
            ->with('label')
            ->whereDate('start_time', now())
            ->groupBy(['label_id', 'start_time'])
            ->orderBy('start_time', 'desc')
            ->paginate();
    }

    /**
     * @param array $data
     * @return array
     */
    public function create(array $data): array
    {
        /** @var Label $label */
        $label = Label::query()->whereKey($data['label'])->firstOrFail();

        /** @var Discount $discount */
        $discount = Discount::query()->whereKey($data['discount'])->firstOrFail();

        unset($data['label']);
        unset($data['discount']);

        $data['uah_per_hour'] = SettingsHelper::getPricePerHour();
        $data['label_name'] = $label->getAttribute('name');
        $data['discount_amount'] = $discount->getAttribute('amount');
        $data['discount_unit'] = $discount->getAttribute('unit');

        return DB::transaction(function () use ($data, $label, $discount) {
            $visits = [];

            // TODO check
            for ($i = 1; $i > $data['visitors_amount']; $i++) {
                /** @var Visit $visit */
                $visit = Visit::query()->create($data);
                $visit->label()->associate($label);
                $visit->discount()->associate($discount);

                $visits[] = $visit;
            }

            return $visits;
        });
    }

    /**
     * @param \App\Models\Visit $label
     * @param array $data
     * @return bool
     */
    public function update(Visit $label, array $data): bool
    {
        return $label->update($data);
    }

    /**
     * @param \App\Models\Visit $label
     * @param bool $force
     * @return bool
     */
    public function delete(Visit $label, bool $force = false): bool
    {
        return $force ? $label->forceDelete() : $label->delete();
    }

    /**
     * @param string|null $filter
     * @param array|null $filterDate
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function getQueryWithFilters(string $filter = null, array $filterDate = null): Builder
    {
        $query = Visit::query();

        if ($filter['from'] ?? null) {
            $query->whereBetween('start_time', [$filter['from'], $filter['to'] ?? now()]);
        }

        if (Filters::ACTIVE === $filter) {
            $query->whereNull('end_time');
        } elseif (Filters::INACTIVE === $filter) {
            $query->whereNotNull('end_time');
        } elseif (Filters::DELETED === $filter) {
            $query->onlyTrashed();
        } elseif (Filters::ALL === $filter) {
            $query->withTrashed();
        } elseif (Filters::UNPAID === $filter) {
            $query->where('is_paid', '=', false)
                ->whereNotNull('end_time');
        } elseif (Filters::WITH_NOTES === $filter) {
            $query->whereNotNull('note');
        }

        return $query;
    }
}

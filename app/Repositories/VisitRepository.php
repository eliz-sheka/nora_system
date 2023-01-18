<?php

namespace App\Repositories;

use App\Enums\Filters;
use App\Helpers\SettingsHelper;
use App\Models\Discount;
use App\Models\Label;
use App\Models\Visit;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
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
        return Visit::query()
            ->select(['visits.id', 'visits.start_time', DB::raw('count(visitors.id) as visitors_amount'), 'labels.name as label_name'])
            ->with(['label'])
            ->join('visitors', 'visitors.visit_id', '=', 'visits.id')
            ->join('labels', 'visits.label_id', '=', 'labels.id')
            ->whereDate('visits.start_time', now())
            ->where('is_active', true)
            ->groupBy('visits.id')
            ->orderBy('visits.start_time', 'desc')
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
        $discount = null;

        if ($data['discount']) {
            /** @var Discount $discount */
            $discount = Discount::query()->whereKey($data['discount'])->firstOrFail();

            $data['discount_amount'] = $discount->getAttribute('amount');
            $data['discount_unit'] = $discount->getAttribute('unit');
        }

        unset($data['label']);
        unset($data['discount']);

        $data['uah_per_hour'] = SettingsHelper::getPricePerHour();
        $data['label_name'] = $label->getAttribute('name');
        $data['start_time'] = now();

        return DB::transaction(function () use ($data, $label, $discount) {
            $visitsData = [];

            for ($i = 1; $i <= $data['visitors_number']; $i++) {
                $visitsData[] = $data;
            }

            $visits = $label->visit()->createMany($visitsData);

            foreach ($visits as $visit) {
                $visit->label()->associate($label);

                if ($discount) {
                    $visit->discount()->associate($discount);
                }
            }

            return $visits->toArray();
        });
    }

    /**
     * @param \App\Models\Visit $visit
     * @param array $data
     * @return bool
     */
    public function update(Visit $visit, array $data): bool
    {
        // TODO update label and discount

        return $visit->update($data);
    }

    /**
     * @param \App\Models\Visit $visit
     * @param bool $force
     * @return bool
     */
    public function delete(Visit $visit, bool $force = false): bool
    {
        return $force ? $visit->forceDelete() : $visit->delete();
    }

    /**
     * @param array $ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getMany(array $ids): Collection
    {
        return Visit::query()->with(['label', 'discount'])->whereKey($ids)->get();
    }

    public function close(): array
    {
        return [];
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

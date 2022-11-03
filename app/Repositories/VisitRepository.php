<?php

namespace App\Repositories;

use App\Enums\Filters;
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
            ->groupBy(['label_id', 'start_time'])
            ->paginate();
    }

    /**
     * @param array $data
     * @return \App\Models\Visit
     */
    public function create(array $data): Visit
    {
        /** @var Visit */
        return Visit::query()->create($data);
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

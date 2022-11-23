<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use SoftDeletes;

    const FILTER_ACTIVE = 'active';
    const FILTER_INACTIVE = 'inactive';
    const FILTER_DELETED = 'deleted';
    const FILTER_ALL = 'all';

    protected $table = 'discounts';
    protected $fillable = [
        'name',
        'description',
        'amount',
        'unit',
        'quantity',
        'active_from',
        'active_till',
    ];

    protected $casts = [
        'active_from' => 'datetime:d-m-Y',
        'active_till' => 'datetime:d-m-Y',
    ];

    protected $dates = [
        'active_till',
        'active_from',
    ];

    public function visit(): HasMany
    {
        return $this->hasMany(Visit::class, 'visit_id', 'id');
    }

    /**
     * @param string|null $date
     * @param string $format
     * @return string
     */
    public function formatDate(?string $date, string $format = 'd-m-Y'): string
    {
        if (!$date) {
            return '-';
        }

        return Carbon::createFromDate($date)->format($format);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query): Builder
    {
        return $query->where(function ($q) {
                $q->where('active_till', '>', now())
                    ->orWhereNull('active_till');
            })
            ->where(function ($q) {
                $q->where('quantity', '>', 0)
                    ->orWhereNull('quantity');
            });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Label extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'labels';

    protected $fillable = [
        'name',
    ];

    public function visit(): HasMany
    {
        return $this->hasMany(Visit::class, 'label_id', 'id');
    }

    /**
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAvailable($query): Builder
    {
        return $query->leftJoin('visits', function ($q) {
            $q->on('visits.label_id', 'labels.id')
                ->where(DB::raw('DATE(visits.start_time)'), DB::raw('DATE(NOW())'));
            })
            ->where(function ($q) {
                $q->where('visits.is_active', false)
                    ->orWhereNull('visits.is_active');
            })
            ->distinct();
    }
}

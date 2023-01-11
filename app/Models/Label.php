<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        return $query->leftJoin('visits', 'visits.label_id', 'labels.id')
            ->whereNotNull('visits.end_time')
            ->orWhereNull('visits.id')
            ->distinct();
    }
}

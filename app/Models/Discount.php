<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use SoftDeletes;

    public const UNIT_PERCENT = '%';
    public const UNIT_UAH = 'uah';

    protected $table = 'discount';
    protected $fillable = [
        'name',
        'description',
        'amount',
        'unit',
        'quantity',
        'active_till',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'label_id', 'id', 'user');
    }

    public function visit(): HasMany
    {
        return $this->hasMany(Visit::class, 'label_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visit extends Model
{
    use SoftDeletes;

    protected $table = 'visitors';

    protected $fillable = [
        'start_time',
        'end_time',
        'uah_per_hour',
        'total_check_amount',
    ];

    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class, 'discount_id', 'id', 'discount');
    }

    public function label(): BelongsTo
    {
        return $this->belongsTo(Label::class, 'label_id', 'id', 'label');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id', 'user');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ChangesHistory extends Model
{
    public const ACTION_CREATE = 1;
    public const ACTION_UPDATE = 2;
    public const ACTION_DELETE = 3;

    protected $table = 'visits_history';
    protected $fillable = [
        'action',
        'initial_value',
        'changed_value',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return MorphTo
     */
    public function model(): MorphTo
    {
        return $this->morphTo();
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visit extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'visits';

    protected $fillable = [
        'note',
        'start_time',
        'is_active',
    ];

    public function label(): BelongsTo
    {
        return $this->belongsTo(Label::class, 'label_id', 'id', 'label');
    }

    public function visitType(): BelongsTo
    {
        return $this->belongsTo(VisitType::class, 'visit_type_id', 'id', 'visitType');
    }

    public function visitors(): HasMany
    {
        return $this->hasMany(Visitor::class, 'visit_id', 'id',);
    }

    public function getFormattedStartTimeAttribute(): string
    {
        return $this->formatDateTime($this->getAttribute('start_time'), 'H:i');
    }

    public function formatDateTime($date = null, string $format = 'H:i d-m-Y'): string
    {
        if (!$date) {
            return '-';
        }

        return (new Carbon($date))->format($format);
    }
}

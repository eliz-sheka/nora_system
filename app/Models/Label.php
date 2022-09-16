<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Label extends Model
{
    use SoftDeletes;

    protected $table = 'labels';

    protected $fillable = [
        'name',
    ];

    public function visit(): HasMany
    {
        return $this->hasMany(Visit::class, 'label_id', 'id');
    }
}

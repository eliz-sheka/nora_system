<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisitType extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'visit_types';

    protected $fillable = [
        'description',
        'price',
    ];

    public function visits(): HasMany
    {
        return $this->hasMany(Visit::class, 'visit_type_id', 'id');
    }
}

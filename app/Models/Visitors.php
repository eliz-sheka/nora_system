<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Visitors extends Model
{
    protected $table = 'visitors';

    protected $fillable = [
        'start_time',
        'end_time',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    public function label(): HasOne
    {
        return $this->hasOne(Label::class, 'label_id', 'id');
    }
}

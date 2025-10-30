<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Like extends Pivot
{
    protected $table = 'likes';

    public $incrementing = false;

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'read_at' => 'datetime',
    ];


}

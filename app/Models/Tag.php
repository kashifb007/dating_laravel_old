<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Translatable\HasTranslations;

class Tag extends Model
{
    use HasTranslations;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public $translatable = ['name'];

    protected function casts(): array
    {
        return [
            'name' => 'array',
        ];
    }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }
}

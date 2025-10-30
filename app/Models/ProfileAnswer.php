<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ProfileAnswer extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function answerable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getResolvedAnswerAttribute(): ?string
    {
        $model = $this->answerable;

        return match (true) {
            $model instanceof \App\Models\ProfileChoice  => $model->name,
            $model instanceof \App\Models\ProfileQuestion => $this->answer,
            default => null,
        };
    }

    protected function answer(): Attribute
    {
        return Attribute::make(
            set: fn (?string $value) => $value === null
                ? null
                : strip_tags($value),
        );
    }
}

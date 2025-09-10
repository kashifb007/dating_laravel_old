<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\Translatable\HasTranslations;

class ProfileChoice extends Model
{
    use HasTranslations;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected function casts(): array
    {
        return [
            'name' => 'array',
        ];
    }

    public array $translatable = ['name'];

    public function profileQuestion(): BelongsTo
    {
        return $this->belongsTo(ProfileQuestion::class, 'profile_question_id');
    }

    public function profileAnswers(): MorphMany
    {
        return $this->morphMany(ProfileAnswer::class, 'answerable');
    }
}

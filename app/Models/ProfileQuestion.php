<?php

namespace App\Models;

use App\Enums\QuestionTypeEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class ProfileQuestion extends Model
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
            'show_question' => 'boolean',
            'is_required' => 'boolean',
            'name' => 'array',
            'type' => QuestionTypeEnum::class,
        ];
    }

    public array $translatable = ['name'];

    /**
     * Add a slug
     */
    protected function slug(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => Str::slug($value),
        );
    }

    public function profileCategory(): BelongsTo
    {
        return $this->belongsTo(ProfileCategory::class);
    }

    public function profileChoices(): HasMany
    {
        return $this->hasMany(ProfileChoice::class, 'profile_question_id');
    }

    public function profileAnswers(): MorphMany
    {
        return $this->morphMany(ProfileAnswer::class, 'answerable');
    }
}

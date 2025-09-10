<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Language extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function guests(): HasMany
    {
        return $this->hasMany(Guest::class);
    }

    /**
     * Get the countries that use this language.
     */
    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(Country::class)->withTimestamps();
    }

    /**
     * Create media conversions.
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('flag_images')
            ->acceptsMimeTypes(['image/png', 'image/jpg', 'image/jpeg', 'image/gif'])
            ->singleFile()
            ->registerMediaConversions(function (): void {
                $this
                    ->addMediaConversion('sm')
                    ->width(100)
                    ->nonQueued();
            });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use SoftDeletes;
    use HasTranslations;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public array $translatable = ['name'];

    protected function casts(): array
    {
        return [
            'name' => 'array',
            'is_post_code_required' => 'boolean',
            'is_default' => 'boolean',
            'is_active' => 'boolean',
            'tax_rate' => 'decimal:2',
        ];
    }

    public function currencies(): BelongsToMany
    {
        return $this->belongsToMany(Currency::class)->withTimestamps();
    }

    public function plans(): HasMany
    {
        return $this->hasMany(Plan::class);
    }

    public function coupons(): HasMany
    {
        return $this->hasMany(Coupon::class);
    }

    public function guests(): HasMany
    {
        return $this->hasMany(Guest::class);
    }

    /**
     * Get the languages associated with the country.
     */
    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class)->withTimestamps();
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

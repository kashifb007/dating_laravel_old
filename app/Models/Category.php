<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Category extends Model
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
            'sort_order' => 'integer',
            'show_in_menu' => 'boolean',
            'show_in_footer' => 'boolean',
        ];
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(__CLASS__, 'parent_id');
    }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }

    /**
     * Create media conversions.
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('category_images')
            ->acceptsMimeTypes(['image/png', 'image/jpg', 'image/jpeg', 'image/gif'])
            ->singleFile()
            ->registerMediaConversions(function (): void {
                $this
                    ->addMediaConversion('lg')
                    ->width(2048)
                    ->nonQueued();
                $this
                    ->addMediaConversion('md')
                    ->width(1024)
                    ->nonQueued();
                $this
                    ->addMediaConversion('sm')
                    ->width(512)
                    ->nonQueued();
            });
    }
}

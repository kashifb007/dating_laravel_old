<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
            'allow_comments' => 'boolean',
            'post_type' => 'string',
        ];
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    /**
     * Create media conversions.
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('post_images')
            ->acceptsMimeTypes(['image/png', 'image/jpg', 'image/jpeg', 'image/gif'])
            ->singleFile()
            ->registerMediaConversions(function (): void {
                $this
                    ->addMediaConversion('lg')
                    ->width(1024)
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

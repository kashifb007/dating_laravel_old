<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Image extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected function casts(): array
    {
        return [
            'is_approved' => 'boolean',
            'sort_order' => 'int',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Create media conversions.
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('profile_images')
            ->acceptsMimeTypes(['image/png', 'image/jpg', 'image/jpeg', 'image/gif'])
            ->singleFile()
            ->registerMediaConversions(function (): void {
                $this
                    ->addMediaConversion('xl')
                    ->width(1400)
                    ->nonQueued();
                $this
                    ->addMediaConversion('lg')
                    ->width(1024)
                    ->nonQueued();
                $this
                    ->addMediaConversion('md')
                    ->width(512)
                    ->nonQueued();
                $this
                    ->addMediaConversion('sm')
                    ->width(260)
                    ->nonQueued();
            });
    }

    protected static function booted(): void
    {
        static::creating(function (Image $image) {
            if (!is_null($image->sort_order)) {
                return;
            }

            if (!$image->user_id) {
                return;
            }

            $max = static::where('user_id', $image->user_id)->max('sort_order');
            $image->sort_order = is_null($max) ? 0 : ($max + 1);
        });
    }
}

<?php

namespace App\Models;

use App\Enums\UserStatusEnum;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\HasRolesAndPermissions;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser, HasName, MustVerifyEmail
{
    use HasFactory;
    use Notifiable;
    use HasRolesAndPermissions;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'login_expires_at' => 'datetime',
            'password' => 'hashed',
            'dob' => 'date',
            'sex' => 'boolean',
            'is_active' => 'boolean',
            'is_verified' => 'boolean',
            'is_logged_in' => 'boolean',
            'newsletter_email' => 'boolean',
            'newsletter_sms' => 'boolean',
            'newsletter_push' => 'boolean',
            'status' => UserStatusEnum::class,
        ];
    }

    public function getFullNameAttribute(): string
    {
        return trim("{$this->first_name} {$this->last_name}");
    }

    // Gate access to the panel
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasRole(['super-admin', 'owner', 'admin']) && $this->hasVerifiedEmail();
    }

    public function getFilamentName(): string
    {
        $full = trim(($this->first_name ?? '') . ' ' . ($this->last_name ?? ''));
        return $full !== '' ? $full : ($this->email ?? 'User ' . $this->getKey());
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    public function coupons(): HasMany
    {
        return $this->hasMany(Coupon::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function profileAnswers(): HasMany
    {
        return $this->hasMany(ProfileAnswer::class);
    }

    public function sentMessages(): HasMany
    {
        return $this->hasMany(Message::class, 'sender_user_id');
    }

    public function receivedMessages(): HasMany
    {
        return $this->hasMany(Message::class, 'recipient_user_id');
    }

    public function notifications(): MorphMany
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function getIsDummyAttribute(): bool
    {
        return (bool)($this->profile?->is_dummy ?? false);
    }

    public function getIsVerifiedAttribute(): bool
    {
        return (bool)($this->profile?->is_verified ?? false);
    }

    public function getIsSubscribedAttribute(): bool
    {
        return (bool)($this->profile?->is_subscribed ?? false);
    }

    public function getIsActiveAttribute(): bool
    {
        return (bool)($this->profile?->is_active ?? false);
    }

    public function scopeNear(Builder $query, float $lat, float $lng, float $miles = 30, bool $isMiles = true): Builder
    {
        $dLat = $miles / 69;
        $dLng = $miles / (69 * max(cos(deg2rad($lat)), 1e-6));

        if (!$isMiles) {
            $miles *= 0.621371;
        }

        $haversine = '(3959 * 2 * ASIN(SQRT(
        POWER(SIN(RADIANS(profiles.latitude  - ?) / 2), 2) +
        COS(RADIANS(?)) * COS(RADIANS(profiles.latitude)) *
        POWER(SIN(RADIANS(profiles.longitude - ?) / 2), 2)
        )))';

        return $query
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->select('users.*')
            ->whereNotNull('profiles.latitude')
            ->whereNotNull('profiles.longitude')
            ->whereBetween('profiles.latitude', [$lat - $dLat, $lat + $dLat])
            ->whereBetween('profiles.longitude', [$lng - $dLng, $lng + $dLng])
            ->selectRaw("$haversine AS distance", [$lat, $lat, $lng])
            ->having('distance', '<=', $miles)
            ->orderBy('profiles.profile_score', 'desc')
            ->orderBy('distance');
    }
}

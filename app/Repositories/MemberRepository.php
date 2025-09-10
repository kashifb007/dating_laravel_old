<?php

/**
 * Class MemberRepository
 * Author: Kashif Bhatti
 * 30/08/2025
 */

namespace App\Repositories;

use App\Models\User;

class MemberRepository
{
    public function nextMemberDiscover(int $minAge, int $maxAge, float $lat, float $lng, ?bool $sex = null, array $viewedProfiles = [], bool $isMiles = true)
    {
        $query = User::query()
            ->with(['profile', 'images' => function($query) {
                $query->where('is_approved', 1);
            }])
            ->whereHasRole('customer')
            ->whereHas('profile', function ($q) use ($minAge, $maxAge) {
                $q->whereIsActive(true)
                    ->orWhere('is_dummy', true);
                $q->where('age', '>=', $minAge)
                    ->where('age', '<=', $maxAge);
            })
            ->whereNotIn('users.id', $viewedProfiles)
            ->whereHas('images', function($query) {
                $query->where('is_approved', 1);
            })
            ->near($lat, $lng, 30, $isMiles);

        if ($sex !== null) {
            $query->whereHas('profile', function ($q) use ($sex) {
                $q->whereSex($sex);
            });
        }

        return $query->first();
    }
}

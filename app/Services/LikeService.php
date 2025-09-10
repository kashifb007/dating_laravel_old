<?php

/**
 * Class LikeService
 * Author: Kashif Bhatti
 * 13/08/2025
 */

namespace App\Services;

use App\Models\Like;
use Illuminate\Support\Facades\DB;
use Spatie\Async\Pool;

class LikeService
{
    /**
     * Add a like for a given user & member.
     */
    public function addLike(int $userId, int $memberId): bool
    {
        return (new Like())
                ->useShard($memberId)
                ->create([
                    'user_id'    => $userId,
                    'member_id'    => $memberId,
                    'created_at' => now(),
                ]) !== null;
    }

    /**
     * Remove a like for a given user & member.
     */
    public function removeLike(int $userId, int $memberId): int
    {
        return (new Like())
            ->useShard($memberId)
            ->where('user_id', $userId)
            ->where('member_id', $memberId)
            ->delete();
    }

    /**
     * Check if a user has liked a member.
     */
    public function hasLiked(int $userId, int $memberId): bool
    {
        return (new Like())
            ->useShard($memberId)
            ->where('user_id', $userId)
            ->where('member_id', $memberId)
            ->exists();
    }

    /**
     * Get all likes for a member.
     */
    public function getLikesForMember(int $memberId)
    {
        return (new Like())
            ->useShard($memberId)
            ->where('member_id', $memberId)
            ->get();
    }

    /**
     * Count likes for a member.
     */
    public function countLikesForMember(int $memberId): int
    {
        return (new Like())
            ->useShard($memberId)
            ->where('member_id', $memberId)
            ->count();
    }

    public function getMembersLikedByUser(int $userId): array
    {
        $shardCount = config('database.shards.likes');
        $pool = Pool::create();
        $results = collect();

        for ($i = 0; $i < $shardCount; $i++) {
            $pool->add(function () use ($userId, $i) {
                return DB::connection("likes_shard_{$i}")
                    ->table("likes_{$i}")
                    ->where('user_id', $userId)
                    ->pluck('member_id')
                    ->toArray();
            })->then(function ($output) use (&$results) {
                $results = $results->merge($output);
            });
        }

        $pool->wait();

        return $results->unique()->values()->all();
    }
}

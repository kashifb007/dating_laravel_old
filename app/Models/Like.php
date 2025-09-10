<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    /**
     * Configure the model to point to the correct shard table & connection.
     */
    public function useShard(int $memberId): self
    {
        $shardId = $memberId % config('database.shards.likes'); // configurable
        $this->setConnection("likes_shard_{$shardId}");
        $this->setTable("likes_{$shardId}");
        return $this;
    }
}

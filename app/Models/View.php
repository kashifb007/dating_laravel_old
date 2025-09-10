<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class View extends Model
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
        $shardId = $memberId % config('database.shards.views'); // configurable
        $this->setConnection("views_shard_{$shardId}");
        $this->setTable("views_{$shardId}");
        return $this;
    }
}

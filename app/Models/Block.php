<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    /**
     * Configure the model to point to the correct shard table & connection.
     */
    public function useShard(int $userId): self
    {
        $shardId = $userId % config('database.shards.blocks'); // configurable
        $this->setConnection("blocks_shard_{$shardId}");
        $this->setTable("blocks_{$shardId}");
        return $this;
    }
}

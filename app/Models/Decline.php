<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Decline extends Model
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
        $shardId = $userId % config('database.shards.declines'); // configurable
        $this->setConnection("declines_shard_{$shardId}");
        $this->setTable("declines_{$shardId}");
        return $this;
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * won't show in searches and can't view their profile
     * Shards based on user ID to distribute blocks across multiple tables
     * $user->getBlocks() will return all my blocks across all tables, so you can see in "my blocks" and exclude people you have blocked from your searches
     * $member->getBlocks() will be used in searches to exclude members who have blocked you and stop you from contacting them
     */
    public function up(): void
    {
        Schema::create('blocks_0', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained(); //who created the block
            $table->foreignId('member_id')->constrained('users'); //who was blocked
            $table->primary(['user_id', 'member_id']); // Composite primary key
            $table->index(['member_id']);
            $table->timestamps();
        });

        Schema::create('blocks_1', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained(); //who created the block
            $table->foreignId('member_id')->constrained('users'); //who was blocked
            $table->primary(['user_id', 'member_id']); // Composite primary key
            $table->index(['member_id']);
            $table->timestamps();
        });

        Schema::create('blocks_2', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained(); //who created the block
            $table->foreignId('member_id')->constrained('users'); //who was blocked
            $table->primary(['user_id', 'member_id']); // Composite primary key
            $table->index(['member_id']);
            $table->timestamps();
        });

        Schema::create('blocks_3', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained(); //who created the block
            $table->foreignId('member_id')->constrained('users'); //who was blocked
            $table->primary(['user_id', 'member_id']); // Composite primary key
            $table->index(['member_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blocks_0');
        Schema::dropIfExists('blocks_1');
        Schema::dropIfExists('blocks_2');
        Schema::dropIfExists('blocks_3');
    }
};

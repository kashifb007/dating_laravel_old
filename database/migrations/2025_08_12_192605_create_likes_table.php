<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     * Sharded across 4 tables to allow for more likes
     * Shards based on member ID to distribute blocks across multiple tables
     * $member->getLikes() will return all likes for the member, regardless of which shard they are in, this is to get profile score weighting per hour.
     * $user->getLikes() will be slower but not essential for speed, these are "my likes".
     */
    public function up(): void
    {
        Schema::create('likes_0', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained(); //who created the like
            $table->foreignId('member_id')->constrained('users'); //who was liked
            $table->primary(['user_id', 'member_id']); // Composite primary key
            $table->index(['user_id']); //these are "my likes".
            $table->timestamp('read_at')->nullable();
            $table->index(['member_id', 'read_at', 'created_at']); //to fetch likes that I haven't read yet, I'm the member_id
            $table->timestamps();
        });

        Schema::create('likes_1', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained(); //who created the like
            $table->foreignId('member_id')->constrained('users'); //who was liked
            $table->primary(['user_id', 'member_id']); // Composite primary key
            $table->index(['user_id']); //these are "my likes".
            $table->timestamp('read_at')->nullable();
            $table->index(['member_id', 'read_at', 'created_at']); //to fetch likes that I haven't read yet, I'm the member_id
            $table->timestamps();
        });

        Schema::create('likes_2', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained(); //who created the like
            $table->foreignId('member_id')->constrained('users'); //who was liked
            $table->primary(['user_id', 'member_id']); // Composite primary key
            $table->index(['user_id']); //these are "my likes".
            $table->timestamp('read_at')->nullable();
            $table->index(['member_id', 'read_at', 'created_at']); //to fetch likes that I haven't read yet, I'm the member_id
            $table->timestamps();
        });

        Schema::create('likes_3', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained(); //who created the like
            $table->foreignId('member_id')->constrained('users'); //who was liked
            $table->primary(['user_id', 'member_id']); // Composite primary key
            $table->index(['user_id']); //these are "my likes".
            $table->timestamp('read_at')->nullable();
            $table->index(['member_id', 'read_at', 'created_at']); //to fetch likes that I haven't read yet, I'm the member_id
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes_0');
        Schema::dropIfExists('likes_1');
        Schema::dropIfExists('likes_2');
        Schema::dropIfExists('likes_3');
    }
};

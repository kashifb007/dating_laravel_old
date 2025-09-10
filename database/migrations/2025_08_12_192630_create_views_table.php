<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     * Sharded views table for tracking user interactions with content.
     * Shards based on member ID to distribute blocks across multiple tables
     * $member->getViews() will be used more often to get their count of views they've received so it can weigh their profile in searches.
     * $member->getViews() will also be used to show views I have received from other user_ids.
     * The user_id is always the person who created the view, and member_id is the person who was viewed.
     * $user->getViews() will never be used. We don't show who I have viewed, in my account.
     */
    public function up(): void
    {
        Schema::create('views_0', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained(); //who created the view
            $table->foreignId('member_id')->constrained('users'); //who was viewed
            $table->primary(['user_id', 'member_id']); // Composite primary key
            $table->timestamp('read_at')->nullable();
            $table->index(['member_id', 'read_at', 'created_at']);
            $table->timestamps();
        });

        Schema::create('views_1', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained(); //who created the view
            $table->foreignId('member_id')->constrained('users'); //who was viewed
            $table->primary(['user_id', 'member_id']); // Composite primary key
            $table->timestamp('read_at')->nullable();
            $table->index(['member_id', 'read_at', 'created_at']);
            $table->timestamps();
        });

        Schema::create('views_2', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained(); //who created the view
            $table->foreignId('member_id')->constrained('users'); //who was viewed
            $table->primary(['user_id', 'member_id']); // Composite primary key
            $table->timestamp('read_at')->nullable();
            $table->index(['member_id', 'read_at', 'created_at']);
            $table->timestamps();
        });

        Schema::create('views_3', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained(); //who created the view
            $table->foreignId('member_id')->constrained('users'); //who was viewed
            $table->primary(['user_id', 'member_id']); // Composite primary key
            $table->timestamp('read_at')->nullable();
            $table->index(['member_id', 'read_at', 'created_at']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('views_0');
        Schema::dropIfExists('views_1');
        Schema::dropIfExists('views_2');
        Schema::dropIfExists('views_3');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     * Sharded across 4 tables: declines_0, declines_1, declines_2, declines_3
     * Shards based on user ID to distribute blocks across multiple tables
     * $user->getDeclines() for speed, who have I declined, used in searching.
     * $member->getDeclines() will never be used.
     */
    public function up(): void
    {
        Schema::create('declines_0', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained(); //who created the decline
            $table->foreignId('member_id')->constrained('users'); //who was declined
            $table->primary(['user_id', 'member_id']);
            $table->timestamps();
        });

        Schema::create('declines_1', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained(); //who created the decline
            $table->foreignId('member_id')->constrained('users'); //who was declined
            $table->primary(['user_id', 'member_id']);
            $table->timestamps();
        });

        Schema::create('declines_2', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained(); //who created the decline
            $table->foreignId('member_id')->constrained('users'); //who was declined
            $table->primary(['user_id', 'member_id']);
            $table->timestamps();
        });

        Schema::create('declines_3', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained(); //who created the decline
            $table->foreignId('member_id')->constrained('users'); //who was declined
            $table->primary(['user_id', 'member_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('declines_0');
        Schema::dropIfExists('declines_1');
        Schema::dropIfExists('declines_2');
        Schema::dropIfExists('declines_3');
    }
};

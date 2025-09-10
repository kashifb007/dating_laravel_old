<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Posts or Pages.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('permalink')->unique(); //slug for the post
            $table->string('title');
            $table->string('sub_heading')->nullable();
            $table->text('body');
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('allow_comments')->default(true);
            $table->enum('post_type', ['post', 'page'])->default('post');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

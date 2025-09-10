<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * type range is like age you're looking for, 20-25, 30-35, etc. stored as comma separated values "20,25"
     */
    public function up(): void
    {
        Schema::create('profile_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_category_id')->constrained();
            $table->json('name');
            $table->string('slug')->unique();
            $table->enum('type', ['text', 'numeric', 'single choice', 'multi choice', 'range'])->default('text');
            $table->unsignedSmallInteger('min_value')->nullable();
            $table->unsignedSmallInteger('max_value')->nullable();
            $table->unsignedTinyInteger('sort_order')->default(0);
            $table->boolean('show_question')->default(true); //can hide the question in the profile
            $table->boolean('is_required')->default(false); //mandatory question or not
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_questions');
    }
};

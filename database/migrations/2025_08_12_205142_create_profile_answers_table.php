<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * if a question has no Choices, the answerable will be a question ID.
     * This can be a plain text answer or a choice ID.
     */
    public function up(): void
    {
        Schema::create('profile_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->morphs('answerable'); // to the Profile Choice ID or Profile Question this answer belongs to
            $table->text('answer')->nullable(); // the answer text, if applicable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_answers');
    }
};

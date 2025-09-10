<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     * Daily is a one off payment only, not recurring.
     */
    public function up(): void
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->decimal('rate'); //price of the plan
            $table->enum('schedule', ['daily', 'weekly', 'monthly', '3 months', '6 months', 'yearly'])->default('monthly');
            $table->boolean('is_recurring')->default(true); //true for recurring, false for one-off
            $table->string('slug')->unique();
            $table->foreignId('country_id')->constrained();
            $table->foreignId('currency_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};

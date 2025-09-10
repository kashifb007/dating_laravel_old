<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('plan_id')->constrained();
            $table->foreignId('currency_id')->constrained();
            $table->foreignId('coupon_id')->nullable()->constrained();
            $table->enum('schedule', ['daily', 'weekly', 'monthly', '3 months', '6 months', 'yearly'])->default('monthly');
            $table->boolean('is_recurring')->default(true);
            $table->decimal('full_rate'); // The full rate for the subscription
            $table->decimal('actual_rate'); // The rate or discounted rate for the subscription
            $table->dateTime('discount_ends_at')->nullable(); //after which go to full price
            $table->timestamps();
            $table->dateTime('ended_at')->nullable(); //If NULL then keep renewing, if not NULL then subscription has ended
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};

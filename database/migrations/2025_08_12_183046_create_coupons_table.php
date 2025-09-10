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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained();
            $table->foreignId('currency_id')->constrained();
            $table->foreignId('user_id')->nullable()->constrained(); //gesture of goodwill, not required for coupon creation
            $table->decimal('discount');
            $table->boolean('is_percentage')->default(true); //false for fixed amount discount
            $table->enum('duration', ['day', 'week', 'month', '3 months', '6 months', 'year'])->default('day');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};

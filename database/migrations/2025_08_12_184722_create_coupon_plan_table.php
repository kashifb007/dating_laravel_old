<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Many to many pivot table for coupons and plans.
     */
    public function up(): void
    {
        Schema::create('coupon_plan', function (Blueprint $table) {
            $table->foreignId('coupon_id')->constrained();
            $table->foreignId('plan_id')->constrained();
            $table->primary(['coupon_id', 'plan_id']); // Composite primary key
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_plan');
    }
};

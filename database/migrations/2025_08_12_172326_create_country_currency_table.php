<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Many to many pivot table for countries and currencies.
     */
    public function up(): void
    {
        Schema::create('country_currency', function (Blueprint $table) {
            $table->foreignId('country_id')->constrained();
            $table->foreignId('currency_id')->constrained();
            $table->primary(['country_id', 'currency_id']); // Composite primary key
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_currency');
    }
};

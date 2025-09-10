<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * The Flag will come from the Spatie Media Library.
     */
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->json('name'); //Great Britain or Grande-Bretagne
            $table->string('native_name')->nullable();
            $table->string('iso', 2)->unique();
            $table->string('iso3', 3)->unique()->nullable();
            $table->string('phone', 10)->nullable();
            $table->string('code', 10)->nullable();
            $table->boolean('is_post_code_required')->default(false);
            $table->boolean('is_default')->default(false); //default prices will start with this country
            $table->boolean('is_active')->default(true); //if not active then shipping, languages, currencies and prices won't show this country
            $table->decimal('tax_rate', 5)->nullable(); //percentage eg 20.0
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};

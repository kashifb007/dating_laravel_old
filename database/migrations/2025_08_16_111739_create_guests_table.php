<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Can't click on a user, only browse the site as a guest.
     * cookie()->queue(cookie()->forever('guest_session_id', $sessionId));
     */
    public function up(): void
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->uuid('id'); //store this in the cookie or device storage in mobile, (guest_id), so we can track the guest
            $table->string('ip_address', 128); //original IP address of the guest
            $table->foreignId('language_id')->default(1)->constrained();
            $table->boolean('sex')->default(false); //false=female, true=male, only editable once during registration
            $table->boolean('sexual_preference')->nullable()->default(false); //false=female, true=male, NULL=everyone.
            $table->unsignedTinyInteger('profiles_viewed')->default(0);
            $table->unsignedTinyInteger('min_age');
            $table->unsignedTinyInteger('max_age');
            $table->string('city');
            $table->string('location'); //London, Greater London, England, United Kingdom
            $table->foreignId('country_id')->constrained('countries'); //for national searches without lon lat
            $table->decimal('latitude', 11, 8)->nullable(); //to work out distance from address in searches
            $table->decimal('longitude', 11, 8)->nullable();
            $table->unsignedSmallInteger('distance')->nullable()->default(30); //default distance in miles for searches
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};

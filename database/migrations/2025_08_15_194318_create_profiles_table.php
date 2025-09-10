<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Once this is complete the user must complete their full profile (questions), photo and address.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Foreign key to users table
            $table->date('dob'); //only editable once during registration and confirmed by seeing your age
            $table->boolean('sex')->default(false); //false=female, true=male, only editable once during registration
            $table->boolean('sexual_preference')->nullable()->default(false); //false=female, true=male, NULL=everyone.
            $table->unsignedTinyInteger('age'); //cron job to update this field at midnight every day
            $table->unsignedTinyInteger('min_age');
            $table->unsignedTinyInteger('max_age');
            $table->string('city');
            $table->string('location'); //London, Greater London, England, United Kingdom
            $table->foreignId('country_id')->constrained('countries'); //for national searches without lon lat
            $table->decimal('latitude', 11, 8)->nullable(); //to work out distance from city in searches
            $table->decimal('longitude', 11, 8)->nullable();
            $table->unsignedSmallInteger('distance')->nullable()->default(30); //default distance in miles for searches
            $table->unsignedSmallInteger('profile_score')->default(0); //search ranking score depends on many factors like is_active, is_verified, subscribed, profile completeness, offline/online, interactivity, etc.
            $table->boolean('is_active')->default(true); //whether the profile is searchable or hidden.
            $table->boolean('is_verified')->default(false); //verified by proof of identity, email, phone, etc. higher profile score
            $table->boolean('is_dummy')->default(false); //dummy profile or not
            $table->boolean('is_subscribed')->default(false); //active subscription or not
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};

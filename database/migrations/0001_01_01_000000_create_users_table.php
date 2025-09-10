<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * check status upon logging in, if under review or reported then show a message and/or logout the user
     * as soon as the user logs in, update their profile score
     * if remember me is checked, auto logout after 7 days, otherwise 24 hours.
     * Profile is hidden if under review or banned.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone_no', 64)->nullable();
            $table->boolean('newsletter_email')->default(false);
            $table->boolean('newsletter_sms')->default(false);
            $table->boolean('newsletter_push')->default(false);
            $table->enum('status', ['active', 'under review', 'reported', 'banned'])->default('active'); //update this in cron or admin
            $table->string('locale', 8)->default(config('app.locale')); //en
            $table->rememberToken();
            $table->timestamp('last_logged_in_at')->nullable();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};

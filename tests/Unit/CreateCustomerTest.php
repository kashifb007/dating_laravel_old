<?php
/**
 * CreateCustomerTest.php
 * Author: Kashif Bhatti
 * 11/09/2025
 */

use App\Actions\Customer\RegisterAction;
use App\Models\Country;
use App\Models\Language;
use Illuminate\Support\Facades\Hash;

test('can create a new customer', function () {

    $action = new RegisterAction();

    $userData = [
        'first_name' => fake()->firstName(),
        'last_name' => fake()->lastName(),
        'email' => fake()->unique()->safeEmail(),
        'password' => Hash::make('password123'),
        'dob' => now()->subYears(25),
        'newsletterEmail' => false,
        'newsletterSms' => false,
        'newsletterPush' => false,
    ];

    $profileData = [
        'sex' => 1,
        'interestedIn' => 0,
        'fromAge' => 18,
        'toAge' => 35,
        'city' => 'London',
        'location' => 'London, UK',
        'country_id' => Country::whereIso('GB')->first()->id,
        'language_id' => Language::whereLocale('en')->first()->id,
        'lat' => 51.50744560, // Example latitude for London
        'lon' => -0.12776530, // Example longitude for London
    ];

    $user = $action->handle($userData, $profileData);

    expect($user)->whereNotNull('id')
        ->and($user->first_name)->toBe($userData['first_name'])
        ->and($user->email)->toBe($userData['email']);
});

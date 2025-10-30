<?php

namespace Database\Factories;

use App\Enums\GenderEnum;
use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dob = $this->faker->dateTimeBetween('-40 years', '-18 years');
        $age = date_diff(date_create($dob->format('Y-m-d')), date_create())->y;

        return [
            'user_id' => User::factory(),
            'dob' => $dob,
            'sex' => (bool)random_int(GenderEnum::FEMALE->value, GenderEnum::MALE->value),
            'sexual_preference' => (bool)random_int(GenderEnum::FEMALE->value, GenderEnum::MALE->value),
            'age' => $age,
            'min_age' => $this->faker->numberBetween(18, 30),
            'max_age' => $this->faker->numberBetween(31, 50),
            'city' => 'London',
            'location' => 'Greater London',
            'latitude' => 51.50744560, // Example latitude for London
            'longitude' => -0.12776530, // Example longitude for London
            'country_id' => Country::whereIso('GB')->first()->id,
            'profile_score' => $this->faker->numberBetween(10, 500),
            'is_active' => true,
            'is_verified' => (bool)random_int(0, 1),
            'is_subscribed' => (bool)random_int(0, 1),
            'is_dummy' => true,
            'is_profile_complete' => true,
        ];
    }
}

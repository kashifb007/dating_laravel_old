<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->make()->id,
            'address_1' => $this->faker->streetAddress,
            'address_2' => $this->faker->optional()->streetAddress,
            'address_3' => $this->faker->optional()->streetAddress,
            'city' => $this->faker->city,
            'county' => $this->faker->name(),
            'post_code' => $this->faker->postcode,
            'telephone' => $this->faker->optional()->phoneNumber,
            'mobile' => $this->faker->optional()->phoneNumber,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'country_id' => Country::whereIso('GB')->first()->id, // Default to UK
        ];
    }
}

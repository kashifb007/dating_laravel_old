<?php

/**
 * Class GuestDto
 * Author: Kashif Bhatti
 * 28/08/2025
 */

namespace App\DataTransferObjects;

class ProfileDto
{
    public function __construct(
        public bool $sex = true,
        public ?bool $sexual_preference = null,
        public int $fromAge = 18,
        public int $toAge = 18,
        public string $city = '',
        public string $location = '',
        public int $country_id = 0,
        public int $user_id = 0,
        public float $lat = 0,
        public float $lon = 0,
        public string $dob,
        public int $age,
    ) {
    }

    public function toArray(): array
    {
        return [
            'sex' => $this->sex,
            'sexual_preference' => $this->sexual_preference,
            'min_age' => $this->fromAge,
            'max_age' => $this->toAge,
            'city' => $this->city,
            'location' => $this->location,
            'country_id' => $this->country_id,
            'user_id' => $this->user_id,
            'latitude' => $this->lat,
            'longitude' => $this->lon,
            'dob' => $this->dob,
            'age' => $this->age,
        ];
    }
}

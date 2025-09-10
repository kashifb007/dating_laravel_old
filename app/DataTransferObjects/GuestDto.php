<?php

/**
 * Class GuestDto
 * Author: Kashif Bhatti
 * 28/08/2025
 */

namespace App\DataTransferObjects;

class GuestDto
{
    public function __construct(
        public string $ipAddress = '',
        public bool $sex = true,
        public ?bool $interestedIn = null,
        public int $fromAge = 18,
        public int $toAge = 18,
        public string $city = '',
        public string $location = '',
        public int $country_id = 0,
        public int $language_id = 0,
        public float $lat = 0,
        public float $lon = 0,
    ) {
    }

    public function toArray(): array
    {
        return [
            'ip_address' => $this->ipAddress,
            'sex' => $this->sex,
            'interestedIn' => $this->interestedIn,
            'min_age' => $this->fromAge,
            'max_age' => $this->toAge,
            'city' => $this->city,
            'location' => $this->location,
            'language_id' => $this->language_id,
            'country_id' => $this->country_id,
            'latitude' => $this->lat,
            'longitude' => $this->lon,
        ];
    }
}

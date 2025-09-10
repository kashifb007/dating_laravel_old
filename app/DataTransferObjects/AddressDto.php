<?php

/**
 * Class AddressDto
 * Author: Kashif Bhatti
 * 03/08/2025
 */

namespace App\DataTransferObjects;

use App\Http\Requests\Api\AddressRequest;

/**
 * Data Transfer Object for Address
 */
class AddressDto
{
    public function __construct(
        public int $userId,
        public string $addressLine1,
        public ?string $addressLine2 = null,
        public ?string $addressLine3 = null,
        public string $city,
        public ?string $county = null,
        public ?string $postCode = null,
        public ?string $telephone = null,
        public ?string $mobile = null,
        public int $countryId,
        public ?float $longitude = null,
        public ?float $latitude = null,
    ) {
    }

    public static function fromApiRequest(AddressRequest $request): self
    {
        return new self(
            userId: $request->validated('userId'),
            addressLine1: $request->validated('addressLine1'),
            addressLine2: $request->validated('addressLine2'),
            addressLine3: $request->validated('addressLine3'),
            city: $request->validated('city'),
            county: $request->validated('county'),
            postCode: $request->validated('postCode'),
            telephone: $request->validated('telephone'),
            mobile: $request->validated('mobile'),
            countryId: $request->validated('countryId'),
            longitude: $request->validated('longitude'),
            latitude: $request->validated('latitude'),
        );
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->userId,
            'address_1' => $this->addressLine1,
            'address_2' => $this->addressLine2,
            'address_3' => $this->addressLine3,
            'city' => $this->city,
            'county' => $this->county,
            'post_code' => $this->postCode,
            'telephone' => $this->telephone,
            'mobile' => $this->mobile,
            'country_id' => $this->countryId,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
        ];
    }
}

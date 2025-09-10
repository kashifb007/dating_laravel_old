<?php

/**
 * Class NominatimDto
 * Author: Kashif Bhatti
 * 27/08/2025
 */

namespace App\DataTransferObjects;

use App\Http\Requests\Api\NominatimRequest;

class NominatimDto
{
    public function __construct(
        public string $format = 'json',
        public string $city = '',
        public int $limit = 10,
        public string $language = 'en',
        public string $q = '', // search query
    ) {
    }

    public static function fromApiRequest(NominatimRequest $request): self
    {
        return new self(
            format: 'json',
            city: '',
            limit: $request->validated('limit'),
            language: $request->validated('language'),
            q: strtolower($request->validated('q')),
        );
    }

    public function toArray(): array
    {
        return [
            'format' => $this->format,
            'limit' => $this->limit ?? config('services.openstreetmap.limit'),
            'city' => $this->city,
            'accept-language' => $this->language,
            'addressdetails' => 1,
            'q' => $this->q,
        ];
    }
}

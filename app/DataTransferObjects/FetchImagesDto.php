<?php
/**
 * Class FetchImagesDto
 * Author: Kashif Bhatti
 * 10/10/2025
 */

namespace App\DataTransferObjects;

use App\Http\Requests\Api\FetchImagesRequest;

class FetchImagesDto
{
    public function __construct(
        public ?int $userId = null
    )
    {}

    public static function fromApiRequest(FetchImagesRequest $request): self
    {
        return new self(
            userId: $request->get('user_id')
        );
    }

    public static function fromAppRequest(): self
    {
        return new self(
            userId: null
        );
    }
}

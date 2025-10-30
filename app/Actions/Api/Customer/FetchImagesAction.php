<?php
/**
 * Class FetchImagesAction
 * Author: Kashif Bhatti
 * 10/10/2025
 */

namespace App\Actions\Api\Customer;

use App\Interfaces\FetchImagesInterface;
use App\Models\Image;

class FetchImagesAction implements FetchImagesInterface
{
    public function __construct(private int $userId)
    {}

    public function fetchImages()
    {
        return Image::where('user_id', $this->userId)->orderBy('sort_order')->get();
    }
}

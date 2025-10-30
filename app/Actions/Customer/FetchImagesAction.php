<?php
/**
 * Class FetchImagesAction
 * Author: Kashif Bhatti
 * 10/10/2025
 */

namespace App\Actions\Customer;

use App\Interfaces\FetchImagesInterface;

class FetchImagesAction implements FetchImagesInterface
{
    public function __construct(private ?int $userId = null)
    {}

    public function fetchImages()
    {
        $images = auth()->user()->images()->orderBy('sort_order')->get();
        return $images;
    }
}

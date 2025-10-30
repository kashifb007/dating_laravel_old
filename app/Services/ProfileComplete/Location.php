<?php
/**
 * Class Location
 * Author: Kashif Bhatti
 * 21/09/2025
 */

namespace App\Services\ProfileComplete;

class Location extends ProfileComplete
{
    public function check(ProfileStatus $status)
    {
        if (!$status->location) {
            throw new \RuntimeException("Location is missing");
        }
        $this->next($status);
    }
}

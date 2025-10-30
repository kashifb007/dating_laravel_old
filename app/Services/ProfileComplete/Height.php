<?php
/**
 * Class Height
 * Author: Kashif Bhatti
 * 21/09/2025
 */

namespace App\Services\ProfileComplete;

class Height extends ProfileComplete
{
    protected function check(ProfileStatus $status)
    {
        if (!$status->height) {
            throw new \RuntimeException("Height is missing");
        }
        $this->next($status);
    }
}

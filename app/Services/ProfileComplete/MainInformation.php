<?php
/**
 * Class MainInformation
 * Author: Kashif Bhatti
 * 21/09/2025
 */

namespace App\Services\ProfileComplete;

class MainInformation extends ProfileComplete
{
    protected function check(ProfileStatus $status)
    {
        if (!$status->mainInformation) {
            throw new \RuntimeException("Main information is missing");
        }
        $this->next($status);
    }
}

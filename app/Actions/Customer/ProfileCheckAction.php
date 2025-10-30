<?php
/**
 * Class ProfileCheck
 * Author: Kashif Bhatti
 * 21/09/2025
 */

namespace App\Actions\Customer;

use App\Models\User;
use App\Services\ProfileComplete\Height;
use App\Services\ProfileComplete\Location;
use App\Services\ProfileComplete\MainInformation;
use App\Services\ProfileComplete\ProfileStatus;

class ProfileCheckAction
{
    private bool $isComplete;

    public function __construct(int $memberId)
    {
        $location = new Location();
        $height = new Height();
        $mainInformation = new MainInformation();

        $location->succeedWith($height);
        $height->succeedWith($mainInformation);

        try {
            $location->check(new ProfileStatus($memberId));

            $user = User::whereId($memberId)->with('profile')->firstOrFail();
            $user->profile->is_profile_complete = true;
            $user->profile->save();
            $this->isComplete = true;

        } catch (\Exception $e) {
            //once a user's profile is complete it is not possible to make it incomplete again, don't save is_profile_complete = false
            $this->isComplete = false;
        }
    }

    public function handle(): bool
    {
        return $this->isComplete;
    }
}

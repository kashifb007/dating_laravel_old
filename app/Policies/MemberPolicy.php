<?php

namespace App\Policies;

use App\Models\User;

class MemberPolicy
{
    public function view(User $user, User $member): bool
    {
        if (is_null($user->profile->sexual_preference)) {
            return true;
        }
        return $user->profile->sexual_preference === $member->profile->sex;
    }
}

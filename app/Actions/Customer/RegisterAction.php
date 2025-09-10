<?php

/**
 * Class RegisterAction
 * Author: Kashif Bhatti
 * 06/07/2025
 */

namespace App\Actions\Customer;

use App\DataTransferObjects\UserDto;
use App\Models\User;

class RegisterAction
{
    public function handle(UserDto $dto): ?User
    {
        $user = User::create($dto->toArray());
        $user->addRole($dto->role);

        return filled($user) ? $user : null;
    }
}

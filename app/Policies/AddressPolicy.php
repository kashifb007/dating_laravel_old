<?php

namespace App\Policies;

use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class AddressPolicy
{
    public function view(User $user, Address $address): bool
    {
        // Check polymorphic relationship: userable_type and userable_id
        return $address->userable_type === User::class && $address->userable_id === $user->id;
    }

    public function update(User $user, Address $address): bool
    {
        // User can update their own addresses
        return $address->userable_type === User::class && $address->userable_id === $user->id;
    }

    public function delete(User $user, Address $address): bool
    {
        // User can delete their own addresses
        return $address->userable_type === User::class && $address->userable_id === $user->id;
    }
}

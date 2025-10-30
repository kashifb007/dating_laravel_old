<?php

/**
 * Class RegisterAction
 * Author: Kashif Bhatti
 * 06/07/2025
 */

namespace App\Actions\Customer;

use App\DataTransferObjects\ProfileDto;
use App\DataTransferObjects\UserDto;
use App\Enums\RoleEnum;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegisterAction
{
    public function handle(array $validated, array $profileValidated): ?User
    {
        try {
            DB::beginTransaction();

            $userDto = new UserDto(
                first_name: $validated['first_name'],
                last_name: $validated['last_name'],
                email: $validated['email'],
                password: $validated['password'],
                newsletterEmail: $validated['newsletterEmail'] ?? false,
                newsletterSms: $validated['newsletterSms'] ?? false,
                newsletterPush: $validated['newsletterPush'] ?? false,
                role: RoleEnum::CUSTOMER->value,
            );
            $user = User::create($userDto->toArray());

            if (!App::runningUnitTests()) {
                event(new Registered($user));
            }

            $user->addRole(RoleEnum::CUSTOMER->value);
            $age = date_diff(date_create($validated['dob']->format('Y-m-d')), date_create())->y;

            $profileDto = new ProfileDto(
                sex: $profileValidated['sex'],
                sexual_preference: $profileValidated['interestedIn'],
                fromAge: $profileValidated['fromAge'],
                toAge: $profileValidated['toAge'],
                city: $profileValidated['city'],
                location: $profileValidated['location'],
                country_id: $profileValidated['country_id'],
                user_id: $user->id,
                lat: $profileValidated['lat'],
                lon: $profileValidated['lon'],
                dob: $validated['dob'],
                age: $age,
            );

            $profile = Profile::create($profileDto->toArray());
            DB::commit();

            if (!App::runningUnitTests()) {
                Auth::login($user);
                session()->forget('profile_data');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Registration error: ' . $e->getMessage());
            $user = null;
        }

        return filled($user) ? $user : null;
    }
}

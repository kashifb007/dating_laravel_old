<?php

namespace App\Filament\Resources\Users\Pages;

use App\Enums\RoleEnum;
use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function afterCreate(): void
    {
        if ($this->record instanceof MustVerifyEmail && is_null($this->record->email_verified_at)) {
            $this->record->sendEmailVerificationNotification();
        }

        // Auto-assign the admin role on creation.
        if (!$this->record->hasRole(RoleEnum::ADMIN->value)) {
            $this->record->addRole(RoleEnum::ADMIN->value);
        }
    }
}

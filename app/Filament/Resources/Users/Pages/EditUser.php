<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class EditUser extends EditRecord
{
    protected bool $shouldSendVerification = false;
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if ($this->record->email !== $data['email']) {
            $data['email_verified_at'] = null;
            $this->shouldSendVerification = true;
        }

        // Persist to the related profile
        $this->record->profile()->updateOrCreate([], [
            'is_subscribed' => (bool) ($data['is_subscribed'] ?? false),
            'is_verified' => (bool) ($data['is_verified'] ?? false),
        ]);

        // Prevent Users table from trying to save a non-existent column
        unset($data['is_subscribed']);

        return $data;
    }

    protected function afterSave(): void
    {
        if ($this->shouldSendVerification && $this->record instanceof MustVerifyEmail) {
            $this->record->sendEmailVerificationNotification();
        }
    }

}

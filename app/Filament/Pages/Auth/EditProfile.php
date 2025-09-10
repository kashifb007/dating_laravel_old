<?php

namespace App\Filament\Pages\Auth;

use App\Models\Language;
use Filament\Auth\Pages\EditProfile as BaseEditProfile;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EditProfile extends BaseEditProfile
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('last_name')
                    ->required()
                    ->maxLength(255),
                Select::make('locale')
                    ->label('Language')
                    ->options(
                        fn () => Language::query()
                        ->where('is_active', true)
                        ->orderBy('name')
                        ->pluck('name', 'locale')
                        ->toArray()
                    )
                    ->searchable()
                    ->preload()
                    ->required()
                    ->rule('exists:languages,locale'),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }
}

<?php

namespace App\Filament\Resources\Countries\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CountryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('iso')
                    ->required(),
                TextInput::make('iso3'),
                TextInput::make('phone')
                    ->label('Telephone code')
                    ->tel(),
                TextInput::make('code')
                    ->label('Country code'),
                TextInput::make('flag'),
                Toggle::make('is_post_code_required')
                    ->required(),
                Toggle::make('is_default')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('tax_rate')
                    ->numeric(),
            ]);
    }
}

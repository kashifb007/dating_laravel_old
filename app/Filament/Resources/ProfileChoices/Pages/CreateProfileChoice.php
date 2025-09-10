<?php

namespace App\Filament\Resources\ProfileChoices\Pages;

use App\Filament\Resources\ProfileChoices\ProfileChoiceResource;
use Filament\Resources\Pages\CreateRecord;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateProfileChoice extends CreateRecord
{
    use Translatable;

    protected static string $resource = ProfileChoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }
}

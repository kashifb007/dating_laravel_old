<?php

namespace App\Filament\Resources\ProfileChoices\Pages;

use App\Filament\Resources\ProfileChoices\ProfileChoiceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\EditRecord\Concerns\Translatable;

class EditProfileChoice extends EditRecord
{
    use Translatable;

    protected static string $resource = ProfileChoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            DeleteAction::make(),
        ];
    }
}

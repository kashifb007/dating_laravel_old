<?php

namespace App\Filament\Resources\ProfileCategories\Pages;

use App\Filament\Resources\ProfileCategories\ProfileCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\EditRecord\Concerns\Translatable;

class EditProfileCategory extends EditRecord
{
    use Translatable;

    protected static string $resource = ProfileCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            DeleteAction::make(),
        ];
    }
}

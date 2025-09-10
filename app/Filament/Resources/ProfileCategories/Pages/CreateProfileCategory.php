<?php

namespace App\Filament\Resources\ProfileCategories\Pages;

use App\Filament\Resources\ProfileCategories\ProfileCategoryResource;
use Filament\Resources\Pages\CreateRecord;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateProfileCategory extends CreateRecord
{
    use Translatable;

    protected static string $resource = ProfileCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }
}

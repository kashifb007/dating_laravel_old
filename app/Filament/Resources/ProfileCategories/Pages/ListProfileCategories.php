<?php

namespace App\Filament\Resources\ProfileCategories\Pages;

use App\Filament\Resources\ProfileCategories\ProfileCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class ListProfileCategories extends ListRecords
{
    use Translatable;

    protected static string $resource = ProfileCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            CreateAction::make(),
        ];
    }
}

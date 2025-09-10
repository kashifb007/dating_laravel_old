<?php

namespace App\Filament\Resources\ProfileChoices\Pages;

use App\Filament\Resources\ProfileChoices\ProfileChoiceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class ListProfileChoices extends ListRecords
{
    use Translatable;

    protected static string $resource = ProfileChoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            CreateAction::make(),
        ];
    }
}

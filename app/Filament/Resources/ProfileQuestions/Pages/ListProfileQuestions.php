<?php

namespace App\Filament\Resources\ProfileQuestions\Pages;

use App\Filament\Resources\ProfileQuestions\ProfileQuestionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class ListProfileQuestions extends ListRecords
{
    use Translatable;

    protected static string $resource = ProfileQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            CreateAction::make(),
        ];
    }
}

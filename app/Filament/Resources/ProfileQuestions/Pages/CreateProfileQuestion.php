<?php

namespace App\Filament\Resources\ProfileQuestions\Pages;

use App\Filament\Resources\ProfileQuestions\ProfileQuestionResource;
use Filament\Resources\Pages\CreateRecord;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateProfileQuestion extends CreateRecord
{
    use Translatable;

    protected static string $resource = ProfileQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }
}

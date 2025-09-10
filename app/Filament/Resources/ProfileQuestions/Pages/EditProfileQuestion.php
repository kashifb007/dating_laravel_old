<?php

namespace App\Filament\Resources\ProfileQuestions\Pages;

use App\Filament\Resources\ProfileQuestions\ProfileQuestionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\EditRecord\Concerns\Translatable;

class EditProfileQuestion extends EditRecord
{
    use Translatable;

    protected static string $resource = ProfileQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            DeleteAction::make(),
        ];
    }
}

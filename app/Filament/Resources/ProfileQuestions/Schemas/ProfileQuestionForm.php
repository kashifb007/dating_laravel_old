<?php

namespace App\Filament\Resources\ProfileQuestions\Schemas;

use App\Enums\QuestionTypeEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProfileQuestionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('profile_category_id')
                    ->relationship('profileCategory', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Select::make('type')
                    ->options(QuestionTypeEnum::class)
                    ->default('text')
                    ->required(),
                TextInput::make('min_value')
                    ->numeric(),
                TextInput::make('max_value')
                    ->numeric(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('show_question')
                    ->required(),
                Toggle::make('is_required')
                    ->required(),
            ]);
    }
}

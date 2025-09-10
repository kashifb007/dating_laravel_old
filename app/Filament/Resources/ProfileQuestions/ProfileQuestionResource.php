<?php

namespace App\Filament\Resources\ProfileQuestions;

use App\Filament\Resources\ProfileQuestions\Pages\CreateProfileQuestion;
use App\Filament\Resources\ProfileQuestions\Pages\EditProfileQuestion;
use App\Filament\Resources\ProfileQuestions\Pages\ListProfileQuestions;
use App\Filament\Resources\ProfileQuestions\Schemas\ProfileQuestionForm;
use App\Filament\Resources\ProfileQuestions\Tables\ProfileQuestionsTable;
use App\Models\ProfileQuestion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class ProfileQuestionResource extends Resource
{
    use Translatable;

    protected static ?string $model = ProfileQuestion::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Profile Question';
    protected static ?string $modelLabel = 'Profile Question';
    protected static ?string $pluralModelLabel = 'Profile Questions';

    public static function form(Schema $schema): Schema
    {
        return ProfileQuestionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProfileQuestionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProfileQuestions::route('/'),
            'create' => CreateProfileQuestion::route('/create'),
            'edit' => EditProfileQuestion::route('/{record}/edit'),
        ];
    }
}

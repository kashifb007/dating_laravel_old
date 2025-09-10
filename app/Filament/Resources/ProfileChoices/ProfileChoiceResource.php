<?php

namespace App\Filament\Resources\ProfileChoices;

use App\Filament\Resources\ProfileChoices\Pages\CreateProfileChoice;
use App\Filament\Resources\ProfileChoices\Pages\EditProfileChoice;
use App\Filament\Resources\ProfileChoices\Pages\ListProfileChoices;
use App\Filament\Resources\ProfileChoices\Schemas\ProfileChoiceForm;
use App\Filament\Resources\ProfileChoices\Tables\ProfileChoicesTable;
use App\Models\ProfileChoice;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class ProfileChoiceResource extends Resource
{
    use Translatable;

    protected static ?string $model = ProfileChoice::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Profile Choice';
    protected static ?string $modelLabel = 'Profile Choice';
    protected static ?string $pluralModelLabel = 'Profile Choices';

    public static function form(Schema $schema): Schema
    {
        return ProfileChoiceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProfileChoicesTable::configure($table);
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
            'index' => ListProfileChoices::route('/'),
            'create' => CreateProfileChoice::route('/create'),
            'edit' => EditProfileChoice::route('/{record}/edit'),
        ];
    }
}

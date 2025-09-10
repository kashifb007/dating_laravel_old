<?php

namespace App\Filament\Resources\ProfileCategories;

use App\Filament\Resources\ProfileCategories\Pages\CreateProfileCategory;
use App\Filament\Resources\ProfileCategories\Pages\EditProfileCategory;
use App\Filament\Resources\ProfileCategories\Pages\ListProfileCategories;
use App\Filament\Resources\ProfileCategories\Schemas\ProfileCategoryForm;
use App\Filament\Resources\ProfileCategories\Tables\ProfileCategoriesTable;
use App\Models\ProfileCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class ProfileCategoryResource extends Resource
{
    use Translatable;

    protected static ?string $model = ProfileCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Profile Category';
    protected static ?string $modelLabel = 'Profile Category';
    protected static ?string $pluralModelLabel = 'Profile Categories';

    public static function form(Schema $schema): Schema
    {
        return ProfileCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProfileCategoriesTable::configure($table);
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
            'index' => ListProfileCategories::route('/'),
            'create' => CreateProfileCategory::route('/create'),
            'edit' => EditProfileCategory::route('/{record}/edit'),
        ];
    }
}

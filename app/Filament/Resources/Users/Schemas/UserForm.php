<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\UserStatusEnum;
use App\Models\Language;
use App\Models\Role;
use App\Models\User;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\View;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make()
                    ->columnSpanFull()
                    ->tabs([
                        Tabs\Tab::make('General')
                            ->icon('heroicon-o-user')
                            ->schema([
                                Section::make('User Details')
                                    ->description('Manage user account details and settings.')
                                    ->columns()
                                    ->columnSpanFull()
                                    ->icon('heroicon-o-user-circle')
                                    ->schema([
                                        TextInput::make('first_name')
                                            ->required(),
                                        TextInput::make('last_name'),
                                        TextInput::make('email')
                                            ->label('Email address')
                                            ->email()
                                            ->required(),
                                        TextInput::make('phone_no')
                                            ->visible(
                                                fn (?User $record, string $operation) => $operation === 'edit' && $record?->hasRole('customer')
                                            )
                                            ->tel(),
                                        TextInput::make('password')
                                            ->password()
                                            ->visible(fn (string $operation) => $operation === 'create')
                                            ->required(),
                                        Fieldset::make('')
                                            ->columns(1)
                                            ->visible(
                                                fn (?User $record, string $operation) => $operation === 'edit' && $record?->hasRole('customer')
                                            )
                                            ->schema([
                                                Checkbox::make('is_active')
                                                    ->label('Is visible')
                                                    ->hint('only set by the member themselves')
                                                    ->helperText('Can be seen by other members')
                                                    ->visible(
                                                        fn (?User $record, string $operation) => $operation === 'edit' && $record?->hasRole('customer')
                                                    )
                                                    ->afterStateHydrated(function (Checkbox $component, ?User $record) {
                                                        $component->state((bool) $record?->is_active);
                                                    })
                                                    ->disabled(),
                                                Toggle::make('is_subscribed')
                                                    ->visible(
                                                        fn (?User $record, string $operation) => $operation === 'edit' && $record?->hasRole('customer')
                                                    )
                                                    ->afterStateHydrated(function (Toggle $component, ?User $record) {
                                                        $component->state((bool) $record?->is_subscribed);
                                                    }),
                                                Toggle::make('is_verified')
                                                    ->visible(
                                                        fn (?User $record, string $operation) => $operation === 'edit' && $record?->hasRole('customer')
                                                    )
                                                    ->markAsRequired(false)
                                                    ->afterStateHydrated(function (Toggle $component, ?User $record) {
                                                        $component->state((bool) $record?->is_verified);
                                                    })
                                                    ->required(),
                                            ]),
                                        Fieldset::make('')
                                            ->columns(1)
                                            ->visible(
                                                fn (?User $record, string $operation) => $operation === 'edit' && $record?->hasRole('customer')
                                            )
                                            ->schema([
                                                Select::make('roles')
                                                    ->label('Role')
                                                    ->relationship(
                                                        name: 'roles',
                                                        titleAttribute: 'display_name',
                                                        modifyQueryUsing: fn (Builder $query) => $query->whereIn('name', ['admin', 'customer'])
                                                    )
                                                    ->multiple() // many-to-many pivot
                                                    ->default(function () {
                                                        $id = Role::where('name', 'admin')->value('id');
                                                        return $id ? [$id] : []; // preselect Admin
                                                    })
                                                    ->disabled()
                                                    ->dehydrated(fn (string $operation) => $operation === 'create')
                                                    ->visible(fn (string $operation) => $operation === 'create')
                                                    ->preload()
                                                    ->searchable(),
                                                Placeholder::make('roles_readonly')
                                                    ->label('Role')
                                                    ->content(
                                                        fn (?User $record) => optional($record)->roles()
                                                            ->whereIn('name', ['admin', 'customer'])
                                                            ->pluck('display_name')
                                                            ->join(', ') ?: '—'
                                                    )
                                                    ->visible(fn (string $operation) => $operation === 'edit'),
                                                Placeholder::make('email_verified_at')
                                                    ->visible(fn (string $operation) => $operation === 'edit'),
                                            ]),
                                        Select::make('locale')
                                            ->label('Language')
                                            ->options(
                                                fn () => Language::query()
                                                ->where('is_active', true)
                                                ->orderBy('name')
                                                ->pluck('name', 'locale')
                                                ->toArray()
                                            )
                                            ->columnSpanFull()
                                            ->searchable()
                                            ->preload()
                                            ->required()
                                            ->rule('exists:languages,locale'),
                                    ]),
                                Section::make('User Status')
                                    ->columnSpanFull()
                                    ->columns(2)
                                    ->visible(
                                        fn (?User $record, string $operation) => $operation === 'edit' && $record?->hasRole('customer')
                                    )
                                    ->schema([
                                        Fieldset::make('Newsletter Subscriptions')
                                            ->columns(1)
                                            ->schema([
                                                Placeholder::make('info')
                                                ->label('These are only editable by the user themselves via their account settings.'),
                                                Checkbox::make('newsletter_email')
                                                    ->visible(
                                                        fn (?User $record, string $operation) => $operation === 'edit' && $record?->hasRole('customer')
                                                    )
                                                    ->disabled(),
                                                Checkbox::make('newsletter_sms')
                                                    ->visible(
                                                        fn (?User $record, string $operation) => $operation === 'edit' && $record?->hasRole('customer')
                                                    )
                                                    ->disabled(),
                                                Checkbox::make('newsletter_push')
                                                    ->visible(
                                                        fn (?User $record, string $operation) => $operation === 'edit' && $record?->hasRole('customer')
                                                    )
                                                    ->disabled(),
                                            ]),
                                        Select::make('status')
                                            ->options(UserStatusEnum::options())
                                            ->enum(UserStatusEnum::class)
                                            ->default(UserStatusEnum::ACTIVE->value)
                                            ->columnSpanFull()
                                            ->visible(
                                                fn (?User $record, string $operation) => $operation === 'edit' && $record?->hasRole('customer')
                                            )
                                            ->required(),
                                        Checkbox::make('is_dummy')
                                            ->label('Is dummy user')
                                            ->visible(fn (?User $record, string $operation) => $operation === 'edit' && $record?->hasRole('customer'))
                                            ->helperText('Used for testing purposes.')
                                            ->dehydrated(false)
                                            ->disabled()
                                            ->afterStateHydrated(function (Checkbox $component, ?User $record) {
                                                $component->state((bool) $record?->is_dummy);
                                            })
                                    ]),
                            ]),
                        Tabs\Tab::make('Images')
                            ->icon('heroicon-o-shield-check')
                            ->visible(
                                fn (?User $record, string $operation) => $operation === 'edit' && $record?->hasRole('customer')
                            )
                            ->schema([
                                Section::make('User Images')
                                    ->icon('heroicon-o-shield-check')
                                    ->columnSpanFull()
                                    ->columns(2)
                                    ->schema([
                                        View::make('filament.users.images-list')
                                            ->columnSpanFull() // full width
                                            ->visible(fn (?User $record, string $operation) => $operation === 'edit' && $record?->exists && $record?->hasRole('customer'))
                                    ]),
                            ]),
                    ]),
            ]);
    }
}

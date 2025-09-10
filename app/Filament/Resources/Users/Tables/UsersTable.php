<?php

namespace App\Filament\Resources\Users\Tables;

use App\Enums\UserStatusEnum;
use App\Models\User;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(
                fn (): Builder => User::query()
                ->whereHas(
                    'roles',
                    fn (Builder $q) => $q->whereIn('name', ['admin', 'customer'])
                )
            )
            ->columns([
                TextColumn::make('full_name')
                    ->label('Name')
                    ->sortable(
                        query: fn (Builder $query, string $direction) =>
                        $query->orderBy('first_name', $direction)
                    )
                    ->searchable(
                        query: fn (Builder $query, string $search) =>
                        $query->where(
                            fn ($q) => $q
                            ->where('first_name', 'like', "%{$search}%")
                            ->orWhere('last_name', 'like', "%{$search}%")
                        )
                    ),
                TextColumn::make('email')
                    ->sortable()
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn ($state) => ($e = $state instanceof UserStatusEnum ? $state : UserStatusEnum::from($state))->label())
                    ->color(fn ($state) => match ($state instanceof UserStatusEnum ? $state : UserStatusEnum::from($state)) {
                        UserStatusEnum::ACTIVE => 'success',
                        UserStatusEnum::UNDER_REVIEW => 'warning',
                        UserStatusEnum::REPORTED => 'info',
                        UserStatusEnum::BANNED => 'danger',
                    })
                    ->sortable()
                    ->searchable(),
                TagsColumn::make('roles_display')
                    ->label('Role')
                    ->getStateUsing(
                        fn (User $record) => $record->roles()->whereIn('name', ['admin', 'customer'])->pluck('display_name')->filter()->unique()->values()->all()
                    ),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('role')
                    ->label('Role')
                    ->options([
                        'admin' => 'Admin',
                        'customer' => 'Customer',
                    ])
                    ->multiple()
                    ->query(function (Builder $query, array $data): void {
                        $selected = array_filter((array)($data['values'] ?? $data['value'] ?? []));
                        if (!$selected) {
                            return;
                        }

                        $query->whereHas(
                            'roles',
                            fn (Builder $q) => $q->whereIn('name', $selected)
                        );
                    }),
                SelectFilter::make('status')
                    ->label('Status')
                    ->options(UserStatusEnum::options())
                    ->multiple()
                    ->query(function (Builder $query, array $data): void {
                        $selected = array_filter((array)($data['values'] ?? $data['value'] ?? []));
                        if (!$selected) {
                            return;
                        }
                        $query->whereIn('status', $selected);
                    })
                    ->indicateUsing(
                        fn (array $data): array => collect((array)($data['values'] ?? $data['value'] ?? []))
                        ->map(fn ($v) => UserStatusEnum::from($v)->label())
                        ->values()
                        ->all()
                    ),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

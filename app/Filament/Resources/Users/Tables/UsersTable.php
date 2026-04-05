<?php

namespace App\Filament\Resources\Users\Tables;

use App\Filament\Resources\Teams\RelationManagers\UsersRelationManager;
use App\Models\User;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Livewire\Component as Livewire;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('filament-panels::auth/pages/register.form.name.label'))
                    ->searchable(),
                TextColumn::make('email')
                    ->label(__('filament-panels::auth/pages/register.form.email.label'))
                    ->searchable(),
                TextColumn::make('document')
                    ->label('CPF')
                    ->searchable(),
                TextColumn::make('date_of_birth')
                    ->label('Data de Nascimento')
                    ->date(format: 'd/m/Y')
                    ->sortable(),
                TextColumn::make('pivot.role')
                    ->label('Perfil')
                    ->badge()
                    ->visible(fn (Livewire $livewire) => $livewire instanceof UsersRelationManager),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make()
                    ->hidden(fn (User $record) => $record->trashed())
                    ->iconButton(),
                RestoreAction::make()->iconButton(),
                ForceDeleteAction::make()->iconButton(),
            ])
            ->toolbarActions([]);
    }
}

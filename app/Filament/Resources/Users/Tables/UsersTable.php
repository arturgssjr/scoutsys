<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

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
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make()->iconButton(),
            ])
            ->toolbarActions([]);
    }
}

<?php

namespace App\Filament\Resources\Teams\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class TeamsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Equipe')
                    ->searchable(),
                TextColumn::make('foundation_date')
                    ->label('Data de fundação')
                    ->alignCenter()
                    ->date('d/m/Y')
                    ->sortable(),
                TextColumn::make('pivot.role')
                    ->label('Perfil')
                    ->badge(),
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

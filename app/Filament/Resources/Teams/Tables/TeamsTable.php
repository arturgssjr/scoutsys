<?php

namespace App\Filament\Resources\Teams\Tables;

use App\Filament\Resources\Users\RelationManagers\TeamsRelationManager;
use App\Models\Team;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Livewire\Component as Livewire;

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
                    ->badge()
                    ->visible(fn (Livewire $livewire) => $livewire instanceof TeamsRelationManager),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make()
                    ->hidden(fn (Team $record) => $record->trashed())
                    ->iconButton(),
                RestoreAction::make()->iconButton(),
                ForceDeleteAction::make()->iconButton(),
            ])
            ->toolbarActions([]);
    }
}

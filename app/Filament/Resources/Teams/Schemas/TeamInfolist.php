<?php

namespace App\Filament\Resources\Teams\Schemas;

use App\Models\Team;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class TeamInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('')
                    ->tabs([
                        Tabs\Tab::make('')
                            ->schema([
                                TextEntry::make('id')
                                    ->label('Código'),
                                TextEntry::make('name')
                                    ->label('Equipe'),
                                TextEntry::make('foundation_date')
                                    ->label('Data de fundação')
                                    ->date('d/m/Y'),
                                TextEntry::make('deleted_at')
                                    ->dateTime(format: 'd/m/Y H:i:s')
                                    ->visible(fn (Team $record): bool => $record->trashed()),
                            ]),
                    ]),
            ]);
    }
}

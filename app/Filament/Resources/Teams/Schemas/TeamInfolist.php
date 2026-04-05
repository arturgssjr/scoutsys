<?php

namespace App\Filament\Resources\Teams\Schemas;

use App\Models\Team;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class TeamInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make()
                    ->columnSpanFull()
                    ->tabs([
                        Tabs\Tab::make('Team')
                            ->label('Equipe')
                            ->columns(3)
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
                        Tabs\Tab::make('Profile')
                            ->label('Perfil')
                            ->columns()
                            ->schema([
                                Grid::make(1)
                                    ->schema([
                                        TextEntry::make('profile.phone')
                                            ->label('Contato')
                                            ->placeholder('Não informado'),
                                    ]),
                                SpatieMediaLibraryImageEntry::make('profile.photo')
                                    ->label('Foto')
                                    ->placeholder('Não informado')
                                    ->collection('profile-images'),
                            ]),
                        Tabs\Tab::make('Address')
                            ->label('Endereço')
                            ->columns(4)
                            ->schema([
                                TextEntry::make('address.zipcode')
                                    ->label('CEP')
                                    ->placeholder('Não informado'),
                                TextEntry::make('address.street')
                                    ->label('Logradouro')
                                    ->placeholder('Não informado'),
                                TextEntry::make('address.neighborhood')
                                    ->label('Bairro')
                                    ->placeholder('Não informado'),
                                TextEntry::make('address.number')
                                    ->label('Número')
                                    ->placeholder('Não informado'),
                                TextEntry::make('address.complement')
                                    ->label('Complemento')
                                    ->placeholder('Não informado'),
                                TextEntry::make('address.city')
                                    ->label('Cidade')
                                    ->placeholder('Não informado'),
                                TextEntry::make('address.state')
                                    ->label('Estado')
                                    ->placeholder('Não informado'),
                            ]),
                        Tabs\Tab::make('Audit')
                            ->label('Complemento')
                            ->columns()
                            ->schema([
                                TextEntry::make('created_at')
                                    ->label('Cadastrado em')
                                    ->dateTime(format: 'd/m/Y H:i:s')
                                    ->placeholder('-'),
                                TextEntry::make('updated_at')
                                    ->label('Atualizado em')
                                    ->dateTime(format: 'd/m/Y H:i:s')
                                    ->placeholder('-'),
                                TextEntry::make('deleted_at')
                                    ->label('Removido em')
                                    ->dateTime(format: 'd/m/Y H:i:s')
                                    ->visible(fn (Team $record): bool => $record->trashed()),
                            ]),
                    ]),
            ]);
    }
}

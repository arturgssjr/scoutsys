<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\User;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make()
                    ->columnSpanFull()
                    ->tabs([
                        Tabs\Tab::make('User')
                            ->label('Usuário')
                            ->columns()
                            ->schema([
                                TextEntry::make('id')
                                    ->label('Código'),
                                TextEntry::make('name')
                                    ->label(__('filament-panels::auth/pages/register.form.name.label')),
                                TextEntry::make('email')
                                    ->label(__('filament-panels::auth/pages/register.form.email.label')),
                                TextEntry::make('document')
                                    ->label('CPF'),
                                TextEntry::make('date_of_birth')
                                    ->label('Data de Nascimento')
                                    ->date(format: 'd/m/Y'),
                            ]),
                        Tabs\Tab::make('Profile')
                            ->label('Perfil')
                            ->columns()
                            ->schema([
                                Grid::make(1)
                                    ->schema([
                                        TextEntry::make('profile.nickname')
                                            ->label('Nome da camisa')
                                            ->placeholder('Não informado'),
                                        TextEntry::make('profile.shirt_number')
                                            ->label('Número da camisa')
                                            ->placeholder('Não informado'),
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
                            ->columns(4)
                            ->schema([
                                TextEntry::make('email_verified_at')
                                    ->label('Verificado em')
                                    ->dateTime(format: 'd/m/Y H:i:s')
                                    ->placeholder('Não verificado'),
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
                                    ->visible(fn (User $record): bool => $record->trashed()),
                            ]),
                    ]),
            ]);
    }
}

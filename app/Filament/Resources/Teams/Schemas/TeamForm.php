<?php

namespace App\Filament\Resources\Teams\Schemas;

use App\Enums\State;
use App\Filament\Forms\Components\ZipCodeInput;
use App\Services\ZipCode\Contracts\ZipCode;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class TeamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(
                Grid::make()
                    ->columnSpanFull()
                    ->schema([
                        Section::make()
                            ->description('Dados gerais')
                            ->columns()
                            ->columnSpanFull()
                            ->schema(static::getTeamFormFields()),
                        ...static::getProfileFormFields(),
                        ...static::getAddressFormFields(),
                    ]),
            );
    }

    public static function getNameFormField(): TextInput
    {
        return TextInput::make('name')
            ->label(__('filament-panels::auth/pages/register.form.name.label'))
            ->required()
            ->autofocus();
    }

    public static function getFoundationDateFormField(): DatePicker
    {
        return DatePicker::make('foundation_date')
            ->label('Data de Fundação')
            ->required();
    }

    public static function getTeamFormFields(): array
    {
        return [
            static::getNameFormField(),
            static::getFoundationDateFormField(),
        ];
    }

    public static function getProfileFormFields(): array
    {
        return [
            Section::make()
                ->description('Dados da equipe')
                ->columns()
                ->relationship('profile')
                ->schema([
                    TextInput::make('phone')
                        ->label('Contato'),
                    SpatieMediaLibraryFileUpload::make('photo')
                        ->label('Foto')
                        ->collection('profile-images')
                        ->image(),
                ]),
        ];
    }

    public static function getAddressFormFields(): array
    {
        return [
            Section::make()
                ->description('Dados de endereço')
                ->columns()
                ->relationship('address')
                ->schema([
                    ZipCodeInput::make('zipcode')
                        ->label('CEP')
                        ->columnSpanFull()
                        ->zipCode(
                            zipCode: app(ZipCode::class),
                            setFields: [
                                'street' => 'logradouro',
                                'neighborhood' => 'bairro',
                                'number' => 'numero',
                                'complement' => 'complemento',
                                'state' => 'uf',
                                'city' => 'localidade',
                            ]),
                    TextInput::make('street')
                        ->label('Logradouro'),
                    TextInput::make('neighborhood')
                        ->label('Bairro'),
                    TextInput::make('number')
                        ->label('Número'),
                    TextInput::make('complement')
                        ->label('Complemento'),
                    Select::make('state')
                        ->label('Estado')
                        ->options(State::class)
                        ->searchable(),
                    TextInput::make('city')
                        ->label('Cidade'),
                ]),
        ];
    }

    public static function getWizardSteps(): array
    {
        return [
            Wizard\Step::make('Team')
                ->label('Equipe')
                ->description('Dados gerais')
                ->columns()
                ->icon(Heroicon::Trophy)
                ->schema(static::getTeamFormFields()),
            Wizard\Step::make('Profile')
                ->label('Perfil')
                ->description('Dados da equipe')
                ->columns(1)
                ->icon(Heroicon::Identification)
                ->schema(static::getProfileFormFields()),
            Wizard\Step::make('Address')
                ->label('Endereço')
                ->description('Dados de endereço')
                ->icon(Heroicon::Map)
                ->schema(static::getAddressFormFields()),
        ];
    }
}

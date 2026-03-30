<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\State;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components(
                Wizard::make([
                    Wizard\Step::make('User')
                        ->icon(Heroicon::User)
                        ->schema([
                            Grid::make()
                                ->schema([
                                    TextInput::make('name')
                                        ->label(__('filament-panels::auth/pages/register.form.name.label'))
                                        ->required()
                                        ->maxLength(255)
                                        ->autofocus(),
                                    TextInput::make('email')
                                        ->label(__('filament-panels::auth/pages/register.form.email.label'))
                                        ->email()
                                        ->required()
                                        ->maxLength(255)
                                        ->unique(
                                            table: 'users',
                                            column: 'email',
                                            ignoreRecord: true),
                                    TextInput::make('document')
                                        ->label('CPF')
                                        ->required(),
                                    DatePicker::make('date_of_birth')
                                        ->label('Data de Nascimento')
                                        ->required(),
                                    TextInput::make('password')
                                        ->label(__('filament-panels::auth/pages/register.form.password.label'))
                                        ->password()
                                        ->hiddenOn('edit')
                                        ->revealable(filament()->arePasswordsRevealable())
                                        ->required()
                                        ->rule(Password::default())
                                        ->showAllValidationMessages()
                                        ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                                        ->same('passwordConfirmation')
                                        ->validationAttribute(__('filament-panels::auth/pages/register.form.password.validation_attribute')),
                                    TextInput::make('passwordConfirmation')
                                        ->label(__('filament-panels::auth/pages/register.form.password_confirmation.label'))
                                        ->password()
                                        ->hiddenOn('edit')
                                        ->revealable(filament()->arePasswordsRevealable())
                                        ->required()
                                        ->dehydrated(false),
                                ]),
                        ]),
                    Wizard\Step::make('Profile')
                        ->icon(Heroicon::Identification)
                        ->schema([
                            Grid::make(3)
                                ->relationship('profile')
                                ->schema([
                                    TextInput::make('nickname')
                                        ->label('Apelido'),
                                    TextInput::make('shirt_number')
                                        ->label('Nº da camisa'),
                                    TextInput::make('phone')
                                        ->label('Telefone/Celular'),
                                    SpatieMediaLibraryFileUpload::make('photo')
                                        ->label('Foto')
                                        ->columnSpanFull()
                                        ->collection('profile-images')
                                        ->image(),
                                ]),
                        ]),
                    Wizard\Step::make('Address')
                        ->icon(Heroicon::Map)
                        ->schema([
                            Grid::make()
                                ->relationship('address')
                                ->schema([
                                    TextInput::make('zipcode')
                                        ->label('CEP')
                                        ->columnSpanFull(),
                                    TextInput::make('street')
                                        ->label('Logradouro'),
                                    TextInput::make('neighborhood')
                                        ->label('Bairro'),
                                    TextInput::make('number')
                                        ->label('Número'),
                                    TextInput::make('complement')
                                        ->label('Complemento'),
                                    TextInput::make('country')
                                        ->label('País'),
                                    Select::make('state')
                                        ->label('Estado')
                                        ->options(State::class)
                                        ->searchable(),
                                    TextInput::make('city')
                                        ->label('Cidade'),
                                ]),
                        ]),
                ])
            );
    }
}

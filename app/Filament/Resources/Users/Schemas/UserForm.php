<?php

namespace App\Filament\Resources\Users\Schemas;

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
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserForm
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
                            ->schema(static::getUserFormFields()),
                        ...static::getProfileFormFields(),
                        ...static::getAddressFormFields(),
                    ])
            );
    }

    public static function getNameFormField(): TextInput
    {
        return TextInput::make('name')
            ->label(__('filament-panels::auth/pages/register.form.name.label'))
            ->required()
            ->autofocus();
    }

    public static function getEmailFormField(): TextInput
    {
        return TextInput::make('email')
            ->label(__('filament-panels::auth/pages/register.form.email.label'))
            ->email()
            ->required()
            ->unique(
                table: 'users',
                column: 'email',
                ignoreRecord: true);
    }

    public static function getDocumentFormField(): TextInput
    {
        return TextInput::make('document')
            ->label('CPF')
            ->validationAttribute('cpf')
            ->unique()
            ->required();
    }

    public static function getDateOfBirthFormField(): DatePicker
    {
        return DatePicker::make('date_of_birth')
            ->label('Data de Nascimento')
            ->required();
    }

    public static function getPasswordFormField(): TextInput
    {
        return TextInput::make('password')
            ->label(__('filament-panels::auth/pages/register.form.password.label'))
            ->password()
            ->hiddenOn('edit')
            ->revealable(filament()->arePasswordsRevealable())
            ->required()
            ->rule(Password::default())
            ->showAllValidationMessages()
            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
            ->same('passwordConfirmation')
            ->validationAttribute(__('filament-panels::auth/pages/register.form.password.validation_attribute'));
    }

    public static function getPasswordConfirmationFormField(): TextInput
    {
        return TextInput::make('passwordConfirmation')
            ->label(__('filament-panels::auth/pages/register.form.password_confirmation.label'))
            ->password()
            ->hiddenOn('edit')
            ->revealable(filament()->arePasswordsRevealable())
            ->required()
            ->dehydrated(false);
    }

    public static function getUserFormFields(): array
    {
        return [
            static::getNameFormField(),
            static::getEmailFormField(),
            static::getDocumentFormField(),
            static::getDateOfBirthFormField(),
            static::getPasswordFormField(),
            static::getPasswordConfirmationFormField(),
        ];
    }

    public static function getProfileFormFields(): array
    {
        return [
            Section::make()
                ->description('Dados do atleta')
                ->columns(3)
                ->relationship('profile')
                ->schema([
                    TextInput::make('nickname')
                        ->label('Nome da camisa'),
                    TextInput::make('shirt_number')
                        ->label('Número da camisa'),
                    TextInput::make('phone')
                        ->label('Contato'),
                    SpatieMediaLibraryFileUpload::make('photo')
                        ->label('Foto')
                        ->columnSpanFull()
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
            Wizard\Step::make('User')
                ->label('Usuário')
                ->description('Dados gerais')
                ->columns()
                ->icon(Heroicon::User)
                ->schema(UserForm::getUserFormFields()),
            Wizard\Step::make('Profile')
                ->label('Perfil')
                ->description('Dados do atleta')
                ->columns(1)
                ->icon(Heroicon::Identification)
                ->schema(UserForm::getProfileFormFields()),
            Wizard\Step::make('Address')
                ->label('Endereço')
                ->description('Dados de endereço')
                ->icon(Heroicon::Map)
                ->schema(UserForm::getAddressFormFields()),
        ];
    }
}

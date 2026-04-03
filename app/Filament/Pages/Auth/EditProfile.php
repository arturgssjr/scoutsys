<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\EditProfile as BaseEditProfile;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EditProfile extends BaseEditProfile
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        $this->getNameFormComponent(),
                        TextInput::make('document')
                            ->label('CPF')
                            ->required(),
                        DatePicker::make('date_of_birth')
                            ->label('Data de Nascimento')
                            ->required(),
                        $this->getEmailFormComponent()
                            ->columnSpanFull(),
                        $this->getPasswordFormComponent()
                            ->columnSpanFull(),
                        $this->getPasswordConfirmationFormComponent()
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}

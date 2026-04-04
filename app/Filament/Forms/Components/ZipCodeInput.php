<?php

namespace App\Filament\Forms\Components;

use App\Services\ZipCode\Contracts\ZipCode;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Support\Icons\Heroicon;
use Illuminate\Validation\ValidationException;
use Livewire\Component as Livewire;

class ZipCodeInput extends TextInput
{
    public function zipCode(
        ZipCode $zipCode,
        string $errorMessage = 'CEP inválido.',
        array $setFields = [],
    ): static {
        $zipCodeRequest = function (
            ?string $state,
            Livewire $livewire,
            Set $set,
            Component $component,
            string $errorMessage,
            array $setFields,
        ) use ($zipCode) {
            $livewire->validateOnly($component->getKey());

            $response = $zipCode
                ->setZipCode($state)
                ->handle()
                ->collect();

            collect($setFields)->each(fn ($field, $key) => $set($key, $response->get($field) ?? null));

            if ($response->isEmpty() || $response->has('erro')) {
                throw ValidationException::withMessages([
                    $component->getKey() => $errorMessage,
                ]);
            }
        };

        $this
            ->lazy()
            ->length(9)
            ->mask('99999-999')
            ->afterStateUpdated(function (?string $state, Set $set): void {
                if (blank($state)) {
                    $set('street', null);
                    $set('neighborhood', null);
                    $set('number', null);
                    $set('complement', null);
                    $set('city', null);
                    $set('state', null);
                    $set('zipcode', null);
                }
            })
            ->suffixAction(fn (): Action => Action::make('zip-code-search-action')
                ->label('Buscar CEP')
                ->tooltip('Buscar CEP')
                ->icon(Heroicon::MagnifyingGlass)
                ->action(fn (
                    $state,
                    Livewire $livewire,
                    Set $set,
                    Component $component,
                ) => $zipCodeRequest(
                    $state,
                    $livewire,
                    $set,
                    $component,
                    $errorMessage,
                    $setFields
                ))->cancelParentActions()
            );

        return $this;
    }
}

<?php

namespace App\Filament\Resources\Teams\Pages;

use App\Filament\Actions\BackAction;
use App\Filament\Resources\Teams\TeamResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTeam extends ViewRecord
{
    protected static string $resource = TeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            BackAction::make()->url(fn (): string => static::getResource()::getUrl('index')),
        ];
    }
}

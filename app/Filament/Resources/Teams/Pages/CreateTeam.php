<?php

namespace App\Filament\Resources\Teams\Pages;

use App\Filament\Resources\Teams\Schemas\TeamForm;
use App\Filament\Resources\Teams\TeamResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTeam extends CreateRecord
{
    use CreateRecord\Concerns\HasWizard;

    protected static string $resource = TeamResource::class;

    public function getSteps(): array
    {
        return TeamForm::getWizardSteps();
    }
}

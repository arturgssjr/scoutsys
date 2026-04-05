<?php

namespace App\Filament\Resources\Users\RelationManagers;

use App\Enums\TeamUserRole;
use App\Filament\Resources\Teams\TeamResource;
use App\Models\Team;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\AttachAction;
use Filament\Actions\DetachAction;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Support\Exceptions\Halt;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TeamsRelationManager extends RelationManager
{
    protected static string $relationship = 'teams';

    protected static ?string $relatedResource = TeamResource::class;

    public function isReadOnly(): bool
    {
        return false;
    }

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                AttachAction::make()
                    ->preloadRecordSelect()
                    ->schema(fn (AttachAction $action): array => [
                        $action->getRecordSelect(),
                        Select::make('role')
                            ->label('Perfil')
                            ->options(TeamUserRole::class)
                            ->searchable()
                            ->preload(),
                    ])
                    ->before(fn (array $data, AttachAction $action) => $this->validateTeamUserRole(
                        data: $data,
                        action: $action
                    )),
            ])
            ->recordActions([
                ActionGroup::make([
                    Action::make('update_team_user_role')
                        ->label('Alterar perfil')
                        ->icon(Heroicon::PencilSquare)
                        ->color('warning')
                        ->requiresConfirmation()
                        ->schema([
                            Select::make('role')
                                ->label('Perfil')
                                ->options(TeamUserRole::class)
                                ->searchable()
                                ->preload(),
                        ])
                        ->before(fn (array $data, Action $action, Team $record) => $this->validateTeamUserRole(
                            data: $data,
                            action: $action,
                            team: $record
                        ))
                        ->action(fn (Team $record, array $data) => $record->pivot->update(['role' => $data['role']])),
                    DetachAction::make(),
                ])->button(),
            ]);
    }

    /**
     * @throws Halt
     */
    private function validateTeamUserRole(array $data, Action $action, ?Team $team = null): void
    {
        if (! $team) {
            $team = Team::query()->findOrFail($data['recordId']);
        }

        if ($this->getOwnerRecord()->teams()->wherePivot('role', $data['role'])->exists()) {
            Notification::make()
                ->title('Ação não permitida')
                ->body("{$this->getOwnerRecord()->name} não pode ser vinculado a equipe $team->name como {$data['role']->getLabel()}, pois já possui esse perfil em outra equipe.")
                ->warning()
                ->color('warning')
                ->seconds(10)
                ->send();

            $action->halt();
        }
    }
}

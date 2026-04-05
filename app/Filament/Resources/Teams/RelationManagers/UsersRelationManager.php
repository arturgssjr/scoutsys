<?php

namespace App\Filament\Resources\Teams\RelationManagers;

use App\Enums\TeamUserRole;
use App\Filament\Resources\Users\UserResource;
use App\Models\TeamUser;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\AttachAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UsersRelationManager extends RelationManager
{
    protected static string $relationship = 'users';

    protected static ?string $relatedResource = UserResource::class;

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
            ])->recordActions([
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
                        ->before(fn (array $data, Action $action, User $record) => $this->validateTeamUserRole(
                            data: $data,
                            action: $action,
                            user: $record
                        ))
                        ->action(fn (User $record, array $data) => $record->pivot->update(['role' => $data['role']])),
                    DetachAction::make(),
                ])->button(),
            ])
            ->toolbarActions([
                DetachBulkAction::make(),
            ]);
    }

    private function validateTeamUserRole(array $data, Action $action, ?User $user = null): void
    {
        if (! $user) {
            $user = User::query()->findOrFail($data['recordId']);
        }

        if (TeamUser::query()->where('user_id', $user->id)->where('role', $data['role'])->exists()) {
            Notification::make()
                ->title('Ação não permitida')
                ->body("$user->name não pode ser vinculado a equipe {$this->getOwnerRecord()->name} como {$data['role']->getLabel()}, pois já possui esse perfil em outra equipe.")
                ->warning()
                ->color('warning')
                ->seconds(10)
                ->send();

            $action->halt();
        }
    }
}

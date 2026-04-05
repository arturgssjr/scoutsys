<?php

namespace App\Enums;

use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum TeamUserRole: string implements HasColor, HasLabel
{
    case Admin = 'admin';
    case Coach = 'coach';
    case Manager = 'manager';
    case Player = 'player';
    case SuperAdmin = 'superadmin';

    public function getLabel(): string|Htmlable|null
    {
        return match ($this) {
            self::Admin => 'Administrador do sistema',
            self::Coach => 'Técnico',
            self::Manager => 'Diretor',
            self::Player => 'Jogador',
            self::SuperAdmin => 'Master',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Admin => Color::Neutral,
            self::Coach => Color::Blue,
            self::Manager => Color::Yellow,
            self::Player => Color::Green,
            self::SuperAdmin => Color::Red,
        };
    }
}

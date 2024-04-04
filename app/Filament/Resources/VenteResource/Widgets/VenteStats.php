<?php

namespace App\Filament\Resources\VenteResource\Widgets;

use App\Models\Vente;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class VenteStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
           Stat::make('Chiffres realises ce mois',Number::currency(Vente::query()->sum('grand_total'),'XAF'))
        ];
    }
}

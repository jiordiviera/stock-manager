<?php

namespace App\Filament\Resources\ArrivageResource\Widgets;

use App\Models\Arrivage;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProduitStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Produits entrées ces derniers 30 jours', Arrivage::query()->where('date_arrivage', '>=', now()->subDays(30))->count()),
            Stat::make('Produits entrés jusqu\'a présent', Arrivage::query()->count()),
        ];
    }
}

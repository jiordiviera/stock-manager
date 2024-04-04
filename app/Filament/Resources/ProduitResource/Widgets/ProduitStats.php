<?php

namespace App\Filament\Resources\ProduitResource\Widgets;

use App\Models\Produit;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProduitStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Nombres de pieces', Produit::query()->sum('quantite')),
        ];
    }
}

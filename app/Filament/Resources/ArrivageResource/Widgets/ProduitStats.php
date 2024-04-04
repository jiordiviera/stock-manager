<?php

namespace App\Filament\Resources\ArrivageResource\Widgets;

use App\Models\Arrivage;
use App\Models\Produit;
use App\Models\Vente;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProduitStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Arrivage de produits de ces derniers 30 jours', Arrivage::query()
                ->where('created_at', '>=', now()->subDays(30))->count()+Produit::query()->where('created_at','>=',now()->subDays(30))->count()),
            Stat::make('Arrivage entrés jusqu\'a présent', Arrivage::query()->count()+Produit::query()->count()),
            Stat::make('Produits sortis ces derniers 30 jours', Vente::query()->where('created_at', '>=', now()->subDays(30))->count()),
        ];
    }
}

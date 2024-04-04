<?php

namespace App\Filament\Resources\ProduitResource\Pages;

use App\Filament\Resources\ProduitResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProduits extends ListRecords
{
    protected static string $resource = ProduitResource::class;
    protected static ?string $title='Produit';
    protected function getHeaderWidgets(): array
    {
        return [
            ProduitResource\Widgets\ProduitStats::class
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-plus')
                ->label('Nouvelle marchandise')
                ->modalHeading('Enregistrer une vente')
                ->modalIcon('heroicon-s-shopping-bag'),
        ];
    }
}

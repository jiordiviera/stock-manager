<?php

namespace App\Filament\Resources\VenteResource\Pages;

use App\Filament\Resources\VenteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVentes extends ListRecords
{
    protected static string $resource = VenteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-plus')
                ->label('Nouvelle vente')
                ->modalHeading('Enregistrer une vente')
                ->modalIcon('heroicon-s-shopping-bag'),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            VenteResource\Widgets\VenteStats::class,
        ];
    }
}

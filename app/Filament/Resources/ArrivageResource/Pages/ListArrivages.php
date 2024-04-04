<?php

namespace App\Filament\Resources\ArrivageResource\Pages;

use App\Filament\Resources\ArrivageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListArrivages extends ListRecords
{
    protected static string $resource = ArrivageResource::class;
    protected static ?string $title='Nouveaux produits arrivés';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-plus')
                ->label('Enregistrer un arrivage')
                ->modalHeading('Enregistrer une vente')
                ->modalIcon('heroicon-s-shopping-bag'),
        ];
    }
}

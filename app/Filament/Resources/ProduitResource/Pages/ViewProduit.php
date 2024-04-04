<?php

namespace App\Filament\Resources\ProduitResource\Pages;

use App\Filament\Resources\ProduitResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;

class ViewProduit extends ViewRecord
{
protected static string $resource=ProduitResource::class;
protected static ?string $title='Details sur le produits';

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
                ->label('Modifier')
                ->icon('heroicon-s-pencil'),
        ];
    }
}

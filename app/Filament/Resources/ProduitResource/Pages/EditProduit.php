<?php

namespace App\Filament\Resources\ProduitResource\Pages;

use App\Filament\Resources\ProduitResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduit extends EditRecord
{
    protected static string $resource = ProduitResource::class;
    protected static ?string $title='Produit';

    protected function getFormActions(): array
    {
        return [
            $this->getSaveFormAction()
            ->label('Sauvegarder'),
            $this->getCancelFormAction()
            ->label('Annuler'),
        ];
    }

}

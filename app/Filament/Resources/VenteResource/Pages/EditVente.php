<?php

namespace App\Filament\Resources\VenteResource\Pages;

use App\Filament\Resources\VenteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVente extends EditRecord
{
    protected static string $resource = VenteResource::class;
    protected static ?string $title = 'Modifier Vente';

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

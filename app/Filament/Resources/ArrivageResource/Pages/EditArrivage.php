<?php

namespace App\Filament\Resources\ArrivageResource\Pages;

use App\Filament\Resources\ArrivageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArrivage extends EditRecord
{
    protected static string $resource = ArrivageResource::class;
    protected static ?string $title='Arrivages';

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

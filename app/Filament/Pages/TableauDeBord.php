<?php

namespace App\Filament\Pages;

use App\Filament\Resources\ArrivageResource\Widgets\ProduitStats;
use App\Filament\Resources\VenteResource\Widgets\VenteChart;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Actions\FilterAction;
use Filament\Pages\Dashboard\Concerns\HasFiltersAction;

class TableauDeBord extends BaseDashboard
{
    use HasFiltersAction;
    protected static ?string $navigationIcon = 'heroicon-s-home';


    protected static ?string $title = 'Tableau de Bord';

    protected ?string $subheading = 'Bienvenue a vous';

    protected static string $view = 'filament.pages.tableau-de-bord';

    protected function getHeaderWidgets(): array
    {
        return [
            ProduitStats::class,
        ];
    }
    protected function getHeaderActions(): array
    {
        return [
            FilterAction::make()
                ->form([
                    DatePicker::make('startDate'),
                    DatePicker::make('endDate'),
                    // ...
                ]),
        ];
    }
}

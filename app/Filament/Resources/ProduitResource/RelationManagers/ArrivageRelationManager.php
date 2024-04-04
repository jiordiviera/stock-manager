<?php

namespace App\Filament\Resources\ProduitResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArrivageRelationManager extends RelationManager
{
    protected static string $relationship = 'arrivages';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nom')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nom')
            ->columns([
                Tables\Columns\TextColumn::make('produit.nom')
                    ->label('Nom du produit')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantite_arrivée')
                    ->label('Quantité')
                    ->suffix('pièces')
                    ->numeric()
                    ->sortable(),
            ]);
    }
}

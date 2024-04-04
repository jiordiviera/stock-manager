<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArrivageResource\Pages;
use App\Filament\Resources\ArrivageResource\RelationManagers;
use App\Models\Arrivage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArrivageResource extends Resource
{
    protected static ?string $model = Arrivage::class;

    protected static ?string $navigationIcon = 'heroicon-s-arrow-down-circle';
    public static function getGloballySearchableAttributes(): array
    {
        return ['produit.nom'];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('produit_id')
                    ->label('Nom du produit')
                    ->relationship('produit', 'nom')
                    ->placeholder('Choisir un produit')
                    ->required(),
                Forms\Components\TextInput::make('quantite_arrivée')
                    ->label('Quantité de produit arrivée')
                    ->placeholder('Entrez la quantité de produit arrivée ici')
                    ->suffix('pièce(s)')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('Aucun Arrivage')
            ->columns([
                Tables\Columns\TextColumn::make('produit.nom')
                    ->label('Produit')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantite_arrivée')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Modifier'),
                Tables\Actions\DeleteAction::make()
                    ->label('supprimer')
                    ->modalHeading('Supprimer ce produit')
                    ->modalDescription('Êtes vous sur de vouloir supprimer ces produits.')
                    ->modalSubmitActionLabel('Oui, je le veux')
                    ->modalCancelActionLabel('Annuler'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArrivages::route('/'),
            'create' => Pages\CreateArrivage::route('/create'),
            'edit' => Pages\EditArrivage::route('/{record}/edit'),
        ];
    }
}

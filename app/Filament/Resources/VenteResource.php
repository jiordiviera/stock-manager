<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VenteResource\Pages;
use App\Filament\Resources\VenteResource\RelationManagers;
use App\Models\Vente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VenteResource extends Resource
{
    protected static ?string $model = Vente::class;

    protected static ?string $navigationIcon = 'heroicon-s-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Forms\Components\Select::make('produit_id')
                   ->relationship('produit', 'nom')
                    ->required(),
                Forms\Components\TextInput::make('quantite_vendue')
                    ->required()
                    ->numeric()
                    ->default(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('produit_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantite_vendue')
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
                Tables\Actions\EditAction::make(),
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
    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 10 ? 'warning' : 'primary';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVentes::route('/'),
            'create' => Pages\CreateVente::route('/create'),
            'edit' => Pages\EditVente::route('/{record}/edit'),
        ];
    }
}

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

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('produit_id')
                    ->relationship('produit', 'nom')
                    ->required(),
                Forms\Components\TextInput::make('quantite_arrivée')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('produit_id')
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArrivages::route('/'),
            'create' => Pages\CreateArrivage::route('/create'),
            'edit' => Pages\EditArrivage::route('/{record}/edit'),
        ];
    }
}

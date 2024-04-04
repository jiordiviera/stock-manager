<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VenteResource\Pages;
use App\Filament\Resources\VenteResource\RelationManagers;
use App\Models\Produit;
use App\Models\Vente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Number;

class VenteResource extends Resource
{
    protected static ?string $model = Vente::class;

    protected static ?string $navigationIcon = 'heroicon-s-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Fieldset::make('Entrez les informations de la vente ici')
                ->schema([


                    Forms\Components\Group::make([ // ... etc
                        Forms\Components\Select::make('produit_id')
                            ->relationship('produit', 'nom')
                            ->label('Nom du produit')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn($state, Set $set) => $set('prix_vente', Produit::find($state)?->prix ?? 0)),
                        Forms\Components\TextInput::make('quantite_vendue')
                            ->label('Quantité vendue')
                            ->numeric()
                            ->required()
                            ->default(1)
                            ->minValue(1)
                            ->reactive(),
                        Forms\Components\TextInput::make('prix_vente')
                            ->label('Prix de vente')
                            ->suffix('FCFA')
                            ->numeric()
                            ->required(),
                        Forms\Components\Hidden::make('grand_total')
                            ->label('Total de la vente')
                            ->dehydrated(),
                        Forms\Components\DateTimePicker::make('created_at')
                            ->label('Date de la vente')
                            ->required()
                            ->default(now()),
                    ])
                        ->columns(2)->columnSpanFull(),
                    // ... etc
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('Aucune vente')
            ->emptyStateActions([
                Tables\Actions\Action::make('create')
                    ->label('Ajouter une nouvelle vente')
                    ->url(static::getUrl('create'))
                    ->icon('heroicon-s-plus')
                    ->button(),
            ])
            ->emptyStateDescription('Cliquez sur le bouton ci-dessus pour ajouter une nouvelle vente.')
            ->columns([
                Tables\Columns\TextColumn::make('produit.nom')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantite_vendue')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('prix_vente')
                    ->label('Prix de vente')
                    ->money('XAF'),
                Tables\Columns\TextColumn::make('grand_total')
                    ->money('XAF'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date de la vente')
                    ->dateTime()
                    ->sortable(),
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
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
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

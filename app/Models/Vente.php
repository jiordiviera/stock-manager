<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;
    protected $fillable = ['produit_id', 'quantite_vendue','prix_vente'];

    protected $casts=[
        'prix_vente' => MoneyCast::class
    ];
    public function produit(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Produit::class);
    }
    protected static function booted(): void
    {
         static::saving(function (Vente $vente) {
             $vente->grand_total = $vente->quantite_vendue * $vente->prix_vente;
         });
    }

}

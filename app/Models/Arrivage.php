<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Arrivage extends Model
{
    use HasFactory;
    protected $fillable = [
        'produit_id',
        'quantite_arrivée',
    ] ;

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
    protected static function booted()
    {
        static::created(function (Arrivage $arrivage) {
            $arrivage->produit->increment('quantite', $arrivage->quantite_arrivée);
        });
    }
}

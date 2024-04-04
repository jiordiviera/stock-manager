<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\MoneyCast;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'quantite',
        'description',
        'image',
        'prix'
    ];
    protected $casts = [
        'prix'=>MoneyCast::class,
        'image' => 'array',
    ];

    public function ventes()
    {
        return $this->hasMany(Vente::class);
    }

    public function arrivages()
    {
        return $this->hasMany(Arrivage::class);
    }
    public function getTotalQuantity(): int
    {
        return $this->quantite + $this->arrivage->sum('quantite_arrivee');
    }
}

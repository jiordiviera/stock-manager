<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}

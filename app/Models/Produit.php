<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
        'image',
        'prix'
    ];
    protected $casts = [
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
}

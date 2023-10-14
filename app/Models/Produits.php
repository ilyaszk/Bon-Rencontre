<?php

namespace App\Models;

use App\Models\LigneCommande;
use App\Models\InfosCommerciales;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produits extends Model
{
    use HasFactory;
    public function images()
    {
        return $this->hasMany(Images::class);
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie_produits::class, 'categories_id');
    }
    public function reduction()
    {
        return $this->hasOne(Reductions::class);
    }
    public function info_commerciale()
    {
        return $this->belongsTo(InfosCommerciales::class, 'infocom_id');
    }
    public function lignes_commandes()
    {
        return $this->hasMany(LigneCommande::class);
    }
}

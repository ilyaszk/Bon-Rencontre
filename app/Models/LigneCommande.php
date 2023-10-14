<?php

namespace App\Models;

use App\Models\Produits;
use App\Models\SousCommande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LigneCommande extends Model
{
    use HasFactory;
    public function produit()
    {
        return $this->belongsTo(Produits::class, 'produit_id');
    }
    public function sous_commande()
    {
        return $this->belongsTo(SousCommande::class, 'sous_commande_id');
    }
}

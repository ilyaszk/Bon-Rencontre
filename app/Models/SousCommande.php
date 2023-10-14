<?php

namespace App\Models;

use App\Models\Commande;
use App\Models\InfosCommerciales;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SousCommande extends Model
{
    use HasFactory;
    public function lignes_commandes()
    {
        return $this->hasMany(LigneCommande::class);
    }
    public function commande()
    {
        return $this->belongsTo(Commande::class, 'commande_id');
    }
    public function info_comm()
    {
        return $this->belongsTo(InfosCommerciales::class, 'infocom_id');
    }
}

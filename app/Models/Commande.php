<?php

namespace App\Models;

use App\Models\User;
use App\Models\Qrcode;
use App\Models\SousCommande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'prix_total',
    ];

    public function sous_commandes()
    {
        return $this->hasMany(SousCommande::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function qrcode()
    {
        return $this->hasOne(Qrcode::class);
    }
}

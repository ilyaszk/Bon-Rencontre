<?php

namespace App\Models;

use App\Models\Produits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InfosCommerciales extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produits()
    {
        return $this->hasMany(Produits::class, 'infocom_id');
    }
}

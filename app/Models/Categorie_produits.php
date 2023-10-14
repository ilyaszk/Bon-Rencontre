<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie_produits extends Model
{
    use HasFactory;

    public function produits()
    {
        return $this->hasMany(Produits::class, 'categories_id');
    }
}

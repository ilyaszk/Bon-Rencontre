<?php

namespace App\Models;

use App\Models\FaqCategorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FaqBloc extends Model
{
    use HasFactory;
    public function categorie()
    {
        return $this->belongsTo(FaqCategorie::class, 'faq_categorie_id');
    }
}

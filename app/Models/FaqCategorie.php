<?php

namespace App\Models;

use App\Models\FaqBloc;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FaqCategorie extends Model
{
    use HasFactory;
    public function faqBlocs()
    {
        return $this->hasMany(FaqBloc::class);
    }
}

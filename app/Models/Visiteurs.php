<?php

namespace App\Models;

use App\Models\Abonnements;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visiteurs extends Model
{
    use HasFactory;

    public function abonnements()
    {
        return $this->hasMany(Abonnements::class);
    }
}

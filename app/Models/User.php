<?php

namespace App\Models;

use App\Models\Commande;
use App\Models\Abonnements;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'role_as'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function infoCommerciale()
    {
        return $this->hasOne(InfosCommerciales::class);
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    public function abonnements()
    {
        return $this->hasMany(Abonnements::class);
    }

    public function qrcodes()
    {
        return $this->hasMany(Qrcode::class);
    }
}

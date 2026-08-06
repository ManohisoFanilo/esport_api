<?php

// Modèle Profile représentant le profil détaillé d'un joueur
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'nickname',
        'bio',
        'avatar_url',
        'main_game',
        'tournaments_played',
        'wins',
        'losses',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

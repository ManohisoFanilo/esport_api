<?php

// Modèle TeamMember représentant un joueur dans une équipe
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'team_id',
        'user_id',
        'role',
        'gamer_tag',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

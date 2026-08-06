<?php

// Modèle Team représentant une équipe e-sport
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'logo_url',
        'game',
        'country',
        'city',
        'description',
        'players_count',
        'ranking',
        'banner_url',
        'is_active',
        'owner_id',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function members()
    {
        return $this->hasMany(TeamMember::class);
    }
}

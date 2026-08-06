<?php

// Modèle Tournament représentant un tournoi e-sport
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $fillable = [
        'name',
        'game',
        'start_date',
        'end_date',
        'status',
        'description',
        'prize_pool',
        'participants_count',
        'max_participants',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}

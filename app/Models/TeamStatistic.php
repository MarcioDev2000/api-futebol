<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamStatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'match_id',
        'goals_scored',
        'goals_conceded',
        'possession',
        'shots',
        'shots_on_target',
    ];

    // Define as relações com os modelos Team e Match
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function match()
    {
        return $this->belongsTo(matches::class);
    }
}
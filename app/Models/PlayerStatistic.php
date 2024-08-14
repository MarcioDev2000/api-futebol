<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerStatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id',
        'match_id',
        'goals',
        'assists',
        'minutes_played',
        'yellow_cards',
        'red_cards',
    ];

    // Define as relações com os modelos Player e Match
    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function match()
    {
        return $this->belongsTo(matches::class);
    }
}
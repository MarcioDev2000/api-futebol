<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'position',
        'nationality',
        'team_id',
    ];

    // Define a relação com o modelo Team (supondo que você tenha um modelo Team)
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
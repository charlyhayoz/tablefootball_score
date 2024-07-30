<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    public function games()
    {
        return $this->belongsToMany('App\Models\Game', 'game_player', 'player_id', 'game_id')->withPivot('score', 'id');
    }
}

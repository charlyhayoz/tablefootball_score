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

    public function gameplayers()
    {
        return $this->hasMany('App\Models\GamePlayer', 'player_id', 'id');
    }
}

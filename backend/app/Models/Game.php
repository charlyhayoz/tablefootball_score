<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function players()
    {
        return $this->belongsToMany('App\Models\Player', 'game_player', 'game_id', 'player_id')->withPivot('score', 'id');
    }

    public function gameplayers()
    {
        return $this->hasMany('App\Models\GamePlayer', 'game_id', 'id');
    }
}

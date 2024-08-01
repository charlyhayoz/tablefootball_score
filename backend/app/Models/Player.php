<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Player extends Model
{
    use HasFactory;

    public function gamesplayer1()
    {
        return $this->hasMany('App\Models\Game', 'player1_id', 'id');
    }
    public function gamesplayer2()
    {
        return $this->hasMany('App\Models\Game', 'player2_id', 'id');
    }

    public function getGamesAttribute()
    {
        return $this->gamesplayer1->concat($this->gamesplayer2);
    }
}

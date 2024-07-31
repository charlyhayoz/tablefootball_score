<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GamePlayer extends Model
{
  protected $table = 'game_player';

  use HasFactory;

  protected $fillable = [
    'score', 'win', 'game_id', 'player_id'
  ];

  public function game()
  {
    return $this->belongsTo('App\Models\Game', 'game_id', 'id');
  }

  public function player()
  {
    return $this->belongsTo('App\Models\Player', 'player_id', 'id');
  }
}

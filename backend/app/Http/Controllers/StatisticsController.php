<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GamePlayer;
use App\Models\Player;
use Illuminate\Http\Request;

/**
 * @group Statistics
 *
 * API endpoints for retrieving the statistics
 */
class StatisticsController extends Controller
{
    /**
     * Return the statistics for all the players
     * @response [{"pseudo":"Sasha Harber","games_played":7,"games_winned":3,"games_losed":4,"goals_out":44,"goals_in":59,"games_ratio":0.42857142857142855,"goals_difference":-15}]
     */
    public function getStatistics()
    {
        $players = Player::with('gameplayers')->get();
        $games = Game::with('gameplayers')->get();
        $array_players = [];
        foreach ($players as $player) {

            $object = (object)[
                "pseudo" => $player->pseudo,
                "games_played" => $player->gameplayers->filter(function ($gameplayer) {
                    return $gameplayer['win'] != 0;
                })->count(),
                "games_winned" => $player->gameplayers->filter(function ($gameplayer) {
                    return $gameplayer['win'] == 1;
                })->count(),
                "games_losed" => $player->gameplayers->filter(function ($gameplayer) {
                    return $gameplayer['win'] == -1;
                })->count(),
                "goals_out" => $player->gameplayers->sum('score'),
                "goals_in" => 0,
                "games_ratio" => 0,
                "goals_difference" => 0

            ];

            $object->goals_in = $games->filter(function ($game) use ($player) {
                return $game->gameplayers->contains(function ($gameplayer) use ($player) {
                    return $gameplayer->player_id == $player->id;
                });
            })->reduce(function ($carry, $game) use ($player) {
                return $carry + $game->gameplayers->filter(function ($gameplayer) use ($player) {
                    return $gameplayer->player_id != $player->id;
                })->sum('score');
            }, 0);

            $object->games_ratio = $object->games_winned > 0 ? $object->games_winned / $object->games_played   : 0;
            $object->goals_difference = $object->goals_out - $object->goals_in;
            array_push($array_players, $object);
        }

        return response()->json(
            $array_players,
            200
        );
    }
}

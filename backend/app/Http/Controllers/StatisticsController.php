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
     * @response [{"pseudo":"Ms. Mara Lubowitz","games_played":2,"games_winned":2,"games_losed":0,"goals_out":20,"goals_in":6,"games_ratio":1,"goals_difference":14},{"pseudo":"Mr. Steve Schaefer","games_played":3,"games_winned":3,"games_losed":0,"goals_out":30,"goals_in":24,"games_ratio":1,"goals_difference":6},{"pseudo":"Mr. Rodrick Brakus IV","games_played":2,"games_winned":2,"games_losed":0,"goals_out":20,"goals_in":9,"games_ratio":1,"goals_difference":11},{"pseudo":"Mike Pouros","games_played":8,"games_winned":8,"games_losed":0,"goals_out":80,"goals_in":48,"games_ratio":1,"goals_difference":32},{"pseudo":"Miss Ena Thiel","games_played":7,"games_winned":7,"games_losed":0,"goals_out":70,"goals_in":40,"games_ratio":1,"goals_difference":30},{"pseudo":"Era Rath Jr.","games_played":1,"games_winned":1,"games_losed":0,"goals_out":10,"goals_in":9,"games_ratio":1,"goals_difference":1},{"pseudo":"Harold Smith","games_played":5,"games_winned":5,"games_losed":0,"goals_out":50,"goals_in":26,"games_ratio":1,"goals_difference":24},{"pseudo":"Dr. Mckenna Rosenbaum V","games_played":6,"games_winned":6,"games_losed":0,"goals_out":60,"goals_in":28,"games_ratio":1,"goals_difference":32},{"pseudo":"Talon Gulgowski","games_played":0,"games_winned":0,"games_losed":0,"goals_out":0,"goals_in":0,"games_ratio":0,"goals_difference":0},{"pseudo":"Hector Wiza","games_played":5,"games_winned":5,"games_losed":0,"goals_out":50,"goals_in":28,"games_ratio":1,"goals_difference":22},{"pseudo":"Melissa Bruen","games_played":7,"games_winned":7,"games_losed":0,"goals_out":70,"goals_in":56,"games_ratio":1,"goals_difference":14},{"pseudo":"Okey Walter","games_played":7,"games_winned":7,"games_losed":0,"goals_out":70,"goals_in":12,"games_ratio":1,"goals_difference":58},{"pseudo":"Ms. Nina Hill","games_played":3,"games_winned":3,"games_losed":0,"goals_out":30,"goals_in":22,"games_ratio":1,"goals_difference":8},{"pseudo":"Prof. Austen Satterfield","games_played":8,"games_winned":8,"games_losed":0,"goals_out":80,"goals_in":41,"games_ratio":1,"goals_difference":39},{"pseudo":"Carlotta Hettinger","games_played":3,"games_winned":3,"games_losed":0,"goals_out":30,"goals_in":18,"games_ratio":1,"goals_difference":12},{"pseudo":"Alek Stracke MD","games_played":7,"games_winned":7,"games_losed":0,"goals_out":70,"goals_in":24,"games_ratio":1,"goals_difference":46},{"pseudo":"Jamison Kemmer","games_played":4,"games_winned":4,"games_losed":0,"goals_out":40,"goals_in":19,"games_ratio":1,"goals_difference":21},{"pseudo":"Mr. Lee Willms I","games_played":3,"games_winned":3,"games_losed":0,"goals_out":30,"goals_in":15,"games_ratio":1,"goals_difference":15},{"pseudo":"Evert Bashirian DDS","games_played":10,"games_winned":10,"games_losed":0,"goals_out":100,"goals_in":57,"games_ratio":1,"goals_difference":43},{"pseudo":"Polly O'Connell III","games_played":9,"games_winned":9,"games_losed":0,"goals_out":90,"goals_in":52,"games_ratio":1,"goals_difference":38}]
     */
    public function getStatistics()
    {
        $players = Player::with('gamesplayer1', 'gamesplayer2')->get()->append('games');
        $array_players = [];
        foreach ($players as $player) {

            $games = $player->games->filter(function ($game) {
                return $game->status == 'finished';
            });
            $object = (object)[
                "id" => $player->id,
                "pseudo" => $player->pseudo,

                "games_played" => $games->count(),
                "games_winned" => $games->filter(function ($game) use ($player) {
                    return ($game['player1_id'] == $player->id && $game['player1_score'] >= 10) || ($game['player2_id'] == $player->id && $game['player2_score'] >= 10);
                })->count(),
                "games_losed" => $games->filter(function ($game) use ($player) {
                    return !(($game['player1_id'] == $player->id && $game['player1_score'] >= 10) || ($game['player2_id'] == $player->id && $game['player2_score'] >= 10));
                })->count(),
                "goals_out" => $games->reduce(function (int $carry, $game) use ($player) {
                    $goals_out = 0;
                    if ($game['player1_id'] == $player->id) {
                        $goals_out = $game['player1_score'];
                    } else {
                        $goals_out = $game['player2_score'];
                    }
                    return $carry + $goals_out;
                }, 0),
                "goals_in" => $games->reduce(function (int $carry, $game) use ($player) {
                    $goals_in = 0;
                    if ($game['player1_id'] == $player->id) {
                        $goals_in = $game['player2_score'];
                    } else {
                        $goals_in = $game['player1_score'];
                    }
                    return $carry + $goals_in;
                }, 0),
                "games_ratio" => 0,
                "goals_difference" => 0

            ];


            $object->games_ratio = round($object->games_winned > 0 ? $object->games_winned / $object->games_played   : 0, 2);
            $object->goals_difference = $object->goals_out - $object->goals_in;
            array_push($array_players, $object);
        }

        return response()->json(
            $array_players,
            200
        );
    }
}

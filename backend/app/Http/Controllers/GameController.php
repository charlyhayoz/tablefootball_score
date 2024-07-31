<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GamePlayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group Game management
 *
 * API endpoints for managing the game
 */
class GameController extends Controller
{
    /**
     * Display a listing of all the games.
     * @queryParam page integer required Each page contain 15 games
     * @response {"current_page":1,"data":[{"id":1,"status":"finished","created_at":"2024-07-22T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":2,"status":"finished","created_at":"2024-07-25T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":3,"status":"finished","created_at":"2024-07-29T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":4,"status":"finished","created_at":"2024-07-22T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":5,"status":"finished","created_at":"2024-07-20T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":6,"status":"finished","created_at":"2024-07-28T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":7,"status":"finished","created_at":"2024-07-28T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":8,"status":"finished","created_at":"2024-07-23T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":9,"status":"finished","created_at":"2024-07-29T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":10,"status":"finished","created_at":"2024-07-29T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":11,"status":"finished","created_at":"2024-07-23T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":12,"status":"finished","created_at":"2024-07-21T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":13,"status":"finished","created_at":"2024-07-26T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":14,"status":"finished","created_at":"2024-07-28T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":15,"status":"finished","created_at":"2024-07-24T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"}],"first_page_url":"http:\/\/localhost\/api\/game?page=1","from":1,"last_page":7,"last_page_url":"http:\/\/localhost\/api\/game?page=7","links":[{"url":null,"label":"&laquo; Previous","active":false},{"url":"http:\/\/localhost\/api\/game?page=1","label":"1","active":true},{"url":"http:\/\/localhost\/api\/game?page=2","label":"2","active":false},{"url":"http:\/\/localhost\/api\/game?page=3","label":"3","active":false},{"url":"http:\/\/localhost\/api\/game?page=4","label":"4","active":false},{"url":"http:\/\/localhost\/api\/game?page=5","label":"5","active":false},{"url":"http:\/\/localhost\/api\/game?page=6","label":"6","active":false},{"url":"http:\/\/localhost\/api\/game?page=7","label":"7","active":false},{"url":"http:\/\/localhost\/api\/game?page=2","label":"Next &raquo;","active":false}],"next_page_url":"http:\/\/localhost\/api\/game?page=2","path":"http:\/\/localhost\/api\/game","per_page":15,"prev_page_url":null,"to":15,"total":100}
     */
    public function index(Request $request)
    {
        $games = Game::with('players')->simplePaginate(15);
        return response()->json(
            $games->items(),
            200
        );
    }

    /**
     * Store a new game and return it.
     * @bodyParam status string required The status of the game. (`finished` or `waiting`). Example: finished, waiting
     * @response {"status":"finished","updated_at":"2024-07-31T11:00:28.000000Z","created_at":"2024-07-31T11:00:28.000000Z","id":102}
     */
    public function store(Request $request)
    {
        $data =  $request->json()->all();

        $validator = Validator::make($data, [
            'status' => 'required|in:finished,waiting'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->getMessages(), 400);
        }

        $game = new Game();
        $game->status = $data['status'];

        $game->save();

        return response()->json(
            $game,
            200
        );
    }

    /**
     * Display a specific game.
     * @queryParam id integer required The id of the game
     * @response {"id":1,"status":"finished","created_at":"2024-07-22T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z","players":[{"id":2,"pseudo":"Dr. Modesto Lakin DDS","avatar":"storage\/image\/avatars\/panda","created_at":"2024-07-30T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z","pivot":{"game_id":1,"player_id":2,"score":10,"win":1}},{"id":13,"pseudo":"Jaylan Stehr","avatar":"storage\/image\/avatars\/meerkat","created_at":"2024-07-30T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z","pivot":{"game_id":1,"player_id":13,"score":8,"win":0}}]}
     */
    public function show(Game $game)
    {
        $game->load('players');
        return response()->json(
            $game,
            200
        );
    }

    /**
     * Update the specified game and return the edited version.
     * @queryParam id integer required The id of the game
     * @queryParam player1_id integer required The id of the first player
     * @queryParam player2_id integer required The id of the second player
     * @queryParam player1_score integer The score of the first player. Min : 0, Max : 10
     * @queryParam player2_score integer The score of the second player. Min : 0, Max : 10
     * @bodyParam status string required The status of the game. (`finished` or `waiting`). Example: finished, waiting
     * @response {"id":1,"status":"finished","created_at":"2024-07-22T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z","players":[{"id":2,"pseudo":"Dr. Modesto Lakin DDS","avatar":"storage\/image\/avatars\/panda","created_at":"2024-07-30T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z","pivot":{"game_id":1,"player_id":2,"score":10,"win":1}},{"id":13,"pseudo":"Jaylan Stehr","avatar":"storage\/image\/avatars\/meerkat","created_at":"2024-07-30T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z","pivot":{"game_id":1,"player_id":13,"score":8,"win":0}}]}
     */
    public function update(Request $request, Game $game)
    {
        $data =  $request->json()->all();

        $validator = Validator::make($data, [
            'status' => 'required|in:finished,waiting',
            'player1_id' => 'required|numeric|exists:App\Models\Player,id',
            'player2_id' => 'required|numeric|exists:App\Models\Player,id',
            'player1_score' => 'numeric|min:0|max:10',
            'player2_score' => 'numeric|min:0|max:10'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->getMessages(), 400);
        }

        $game->status = $data['status'];

        $game->gameplayers()->whereNotIn('player_id', [$data['player1_id'], $data['player2_id']])->delete();

        GamePlayer::updateOrCreate([
            'player_id' => $data['player1_id'],
            'game_id' => $game->id
        ], [
            'score' => $data['player1_score'] ?? 0,
            'win' => $data['player1_score'] != null && $data['player1_score'] >= 10 ? 1 : ($data['player2_score'] != null && $data['player2_score'] >= 10 ? -1 : 0)
        ]);

        GamePlayer::updateOrCreate([
            'player_id' => $data['player2_id'],
            'game_id' => $game->id
        ], [
            'score' => $data['player2_score'] ?? 0,
            'win' => $data['player2_score'] != null && $data['player2_score'] >= 10 ? 1 : ($data['player1_score'] != null && $data['player1_score'] >= 10 ? -1 : 0)
        ]);

        $game->save();
        $game->load('players');

        return response()->json(
            $game,
            200
        );
    }

    /**
     * Delete the specified game and return it.
     * @queryParam id integer required The id of the game
     * @response {"status":"finished","updated_at":"2024-07-31T11:00:28.000000Z","created_at":"2024-07-31T11:00:28.000000Z","id":102}
     */
    public function destroy(Game $game)
    {
        $game->delete();

        return response()->json(
            $game,
            200
        );
    }
}

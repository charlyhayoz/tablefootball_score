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
     * @response [{"id":1,"status":"finished","player1_id":5,"player2_id":4,"player1_score":10,"player2_score":7,"created_at":"2024-07-23T10:08:41.000000Z","updated_at":"2024-08-01T10:08:42.000000Z","player1":{"id":5,"pseudo":"Miss Ena Thiel","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"},"player2":{"id":4,"pseudo":"Mike Pouros","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"}},{"id":2,"status":"finished","player1_id":8,"player2_id":6,"player1_score":10,"player2_score":2,"created_at":"2024-07-30T10:08:41.000000Z","updated_at":"2024-08-01T10:08:42.000000Z","player1":{"id":8,"pseudo":"Dr. Mckenna Rosenbaum V","avatar":"storage\/images\/avatars\/chicken.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"},"player2":{"id":6,"pseudo":"Era Rath Jr.","avatar":"storage\/images\/avatars\/meerkat.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"}},{"id":3,"status":"finished","player1_id":5,"player2_id":11,"player1_score":10,"player2_score":4,"created_at":"2024-07-27T10:08:41.000000Z","updated_at":"2024-08-01T10:08:42.000000Z","player1":{"id":5,"pseudo":"Miss Ena Thiel","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"},"player2":{"id":11,"pseudo":"Melissa Bruen","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"}},{"id":4,"status":"finished","player1_id":16,"player2_id":11,"player1_score":10,"player2_score":1,"created_at":"2024-07-29T10:08:41.000000Z","updated_at":"2024-08-01T10:08:42.000000Z","player1":{"id":16,"pseudo":"Alek Stracke MD","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"},"player2":{"id":11,"pseudo":"Melissa Bruen","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"}},{"id":5,"status":"finished","player1_id":18,"player2_id":20,"player1_score":10,"player2_score":4,"created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:42.000000Z","player1":{"id":18,"pseudo":"Mr. Lee Willms I","avatar":"storage\/images\/avatars\/panda.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"},"player2":{"id":20,"pseudo":"Polly O'Connell III","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"}},{"id":6,"status":"finished","player1_id":20,"player2_id":16,"player1_score":10,"player2_score":8,"created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:42.000000Z","player1":{"id":20,"pseudo":"Polly O'Connell III","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"},"player2":{"id":16,"pseudo":"Alek Stracke MD","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"}},{"id":7,"status":"finished","player1_id":2,"player2_id":10,"player1_score":10,"player2_score":9,"created_at":"2024-07-29T10:08:41.000000Z","updated_at":"2024-08-01T10:08:42.000000Z","player1":{"id":2,"pseudo":"Mr. Steve Schaefer","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"},"player2":{"id":10,"pseudo":"Hector Wiza","avatar":"storage\/images\/avatars\/chicken.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"}},{"id":8,"status":"finished","player1_id":11,"player2_id":20,"player1_score":10,"player2_score":9,"created_at":"2024-07-22T10:08:41.000000Z","updated_at":"2024-08-01T10:08:42.000000Z","player1":{"id":11,"pseudo":"Melissa Bruen","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"},"player2":{"id":20,"pseudo":"Polly O'Connell III","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"}},{"id":9,"status":"finished","player1_id":2,"player2_id":5,"player1_score":10,"player2_score":7,"created_at":"2024-07-25T10:08:41.000000Z","updated_at":"2024-08-01T10:08:42.000000Z","player1":{"id":2,"pseudo":"Mr. Steve Schaefer","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"},"player2":{"id":5,"pseudo":"Miss Ena Thiel","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"}},{"id":10,"status":"finished","player1_id":16,"player2_id":5,"player1_score":10,"player2_score":3,"created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:42.000000Z","player1":{"id":16,"pseudo":"Alek Stracke MD","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"},"player2":{"id":5,"pseudo":"Miss Ena Thiel","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"}},{"id":11,"status":"finished","player1_id":7,"player2_id":2,"player1_score":10,"player2_score":8,"created_at":"2024-07-22T10:08:41.000000Z","updated_at":"2024-08-01T10:08:42.000000Z","player1":{"id":7,"pseudo":"Harold Smith","avatar":"storage\/images\/avatars\/astronaut.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"},"player2":{"id":2,"pseudo":"Mr. Steve Schaefer","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"}},{"id":12,"status":"finished","player1_id":2,"player2_id":5,"player1_score":10,"player2_score":8,"created_at":"2024-07-22T10:08:41.000000Z","updated_at":"2024-08-01T10:08:42.000000Z","player1":{"id":2,"pseudo":"Mr. Steve Schaefer","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"},"player2":{"id":5,"pseudo":"Miss Ena Thiel","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"}},{"id":13,"status":"finished","player1_id":4,"player2_id":14,"player1_score":10,"player2_score":9,"created_at":"2024-07-28T10:08:41.000000Z","updated_at":"2024-08-01T10:08:42.000000Z","player1":{"id":4,"pseudo":"Mike Pouros","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"},"player2":{"id":14,"pseudo":"Prof. Austen Satterfield","avatar":"storage\/images\/avatars\/chicken.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"}},{"id":14,"status":"finished","player1_id":18,"player2_id":16,"player1_score":10,"player2_score":8,"created_at":"2024-07-28T10:08:41.000000Z","updated_at":"2024-08-01T10:08:42.000000Z","player1":{"id":18,"pseudo":"Mr. Lee Willms I","avatar":"storage\/images\/avatars\/panda.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"},"player2":{"id":16,"pseudo":"Alek Stracke MD","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"}},{"id":15,"status":"finished","player1_id":20,"player2_id":1,"player1_score":10,"player2_score":4,"created_at":"2024-07-24T10:08:41.000000Z","updated_at":"2024-08-01T10:08:42.000000Z","player1":{"id":20,"pseudo":"Polly O'Connell III","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"},"player2":{"id":1,"pseudo":"Ms. Mara Lubowitz","avatar":"storage\/images\/avatars\/panda.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"}}]
     */
    public function index(Request $request)
    {
        $games = Game::with('player1', 'player2')->orderBy('id', 'DESC')->simplePaginate(15);
        return response()->json(
            $games->items(),
            200
        );
    }

    /**
     * Store a new game and return it.
     * @bodyParam status string required The status of the game. (`finished` or `waiting`). Example: finished, waiting
     * @queryParam player1_id integer required The id of the first player
     * @queryParam player2_id integer required The id of the second player
     * @queryParam player1_score integer The score of the first player. Min : 0, Max : 10
     * @queryParam player2_score integer The score of the second player. Min : 0, Max : 10
     * @response {"id":1,"status":"finished","player1_id":5,"player2_id":4,"player1_score":10,"player2_score":7,"created_at":"2024-07-23T10:08:41.000000Z","updated_at":"2024-08-01T10:08:42.000000Z","player1":{"id":5,"pseudo":"Miss Ena Thiel","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"},"player2":{"id":4,"pseudo":"Mike Pouros","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"}}
     */
    public function store(Request $request)
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

        $game = new Game();
        $game->status = $data['status'];
        $game->player1_id = $data['player1_id'];
        $game->player2_id = $data['player2_id'];
        $game->player1_score = $data['player1_score'] ?? 0;
        $game->player2_score = $data['player2_score'] ?? 0;


        $game->save();
        $game->load('player1', 'player2');


        return response()->json(
            $game,
            200
        );
    }

    /**
     * Display a specific game.
     * @queryParam id integer required The id of the game
     * @response {"id":1,"status":"finished","player1_id":5,"player2_id":4,"player1_score":10,"player2_score":7,"created_at":"2024-07-23T10:08:41.000000Z","updated_at":"2024-08-01T10:08:42.000000Z","player1":{"id":5,"pseudo":"Miss Ena Thiel","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"},"player2":{"id":4,"pseudo":"Mike Pouros","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"}}
     */
    public function show(Game $game)
    {
        $game->load('player1', 'player2');

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
     * @response {"id":1,"status":"finished","player1_id":5,"player2_id":4,"player1_score":10,"player2_score":7,"created_at":"2024-07-23T10:08:41.000000Z","updated_at":"2024-08-01T10:08:42.000000Z","player1":{"id":5,"pseudo":"Miss Ena Thiel","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"},"player2":{"id":4,"pseudo":"Mike Pouros","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"}}
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

        $game->player1_id = $data['player1_id'];
        $game->player2_id = $data['player2_id'];
        $game->player1_score = $data['player1_score'] ?? 0;
        $game->player2_score = $data['player2_score'] ?? 0;

        $game->save();
        $game->load('player1', 'player2');

        return response()->json(
            $game,
            200
        );
    }

    /**
     * Delete the specified game and return it.
     * @queryParam id integer required The id of the game
     * @response {"id":1,"status":"finished","player1_id":5,"player2_id":4,"player1_score":10,"player2_score":7,"created_at":"2024-07-23T10:08:41.000000Z","updated_at":"2024-08-01T10:08:42.000000Z","player1":{"id":5,"pseudo":"Miss Ena Thiel","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"},"player2":{"id":4,"pseudo":"Mike Pouros","avatar":"storage\/images\/avatars\/bear.png","created_at":"2024-08-01T10:08:41.000000Z","updated_at":"2024-08-01T10:08:41.000000Z"}}
     */
    public function destroy(Game $game)
    {
        $game->delete();

        $game->load('player1', 'player2');


        return response()->json(
            $game,
            200
        );
    }
}

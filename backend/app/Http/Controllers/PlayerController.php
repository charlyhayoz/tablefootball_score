<?php

namespace App\Http\Controllers;

use App\Helper\Avatar;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group Player management
 *
 * API endpoints for managing the player
 */
class PlayerController extends Controller
{
    /**
     * Display a listing of all the players.
     * @queryParam page integer required Each page contain 15 games
     * @response {"current_page":1,"data":[{"id":1,"pseudo":"Wendell Jacobi","avatar":"storage\/image\/avatars\/rabbit","created_at":"2024-07-30T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":2,"pseudo":"Dr. Modesto Lakin DDS","avatar":"storage\/image\/avatars\/panda","created_at":"2024-07-30T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":3,"pseudo":"Delores Boyle","avatar":"storage\/image\/avatars\/chicken","created_at":"2024-07-30T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":4,"pseudo":"Osbaldo Emard","avatar":"storage\/image\/avatars\/fox","created_at":"2024-07-30T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":5,"pseudo":"Toni Watsica","avatar":"storage\/image\/avatars\/dog","created_at":"2024-07-30T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":6,"pseudo":"Miss Aletha Koepp V","avatar":"storage\/image\/avatars\/astronaut","created_at":"2024-07-30T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":7,"pseudo":"Mariela Emard","avatar":"storage\/image\/avatars\/bear","created_at":"2024-07-30T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":8,"pseudo":"Blanca King","avatar":"storage\/image\/avatars\/dog","created_at":"2024-07-30T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":9,"pseudo":"Darron Hayes","avatar":"storage\/image\/avatars\/bear","created_at":"2024-07-30T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":10,"pseudo":"Meaghan Prosacco PhD","avatar":"storage\/image\/avatars\/dog","created_at":"2024-07-30T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":11,"pseudo":"Dr. Reanna Batz","avatar":"storage\/image\/avatars\/rabbit","created_at":"2024-07-30T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":12,"pseudo":"Greyson Luettgen","avatar":"storage\/image\/avatars\/dog","created_at":"2024-07-30T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":13,"pseudo":"Jaylan Stehr","avatar":"storage\/image\/avatars\/meerkat","created_at":"2024-07-30T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":14,"pseudo":"Jaqueline Marks","avatar":"storage\/image\/avatars\/meerkat","created_at":"2024-07-30T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"},{"id":15,"pseudo":"Miss Myrna Johns","avatar":"storage\/image\/avatars\/chicken","created_at":"2024-07-30T13:49:30.000000Z","updated_at":"2024-07-30T13:49:30.000000Z"}],"first_page_url":"http:\/\/localhost\/api\/player?page=1","from":1,"last_page":2,"last_page_url":"http:\/\/localhost\/api\/player?page=2","links":[{"url":null,"label":"&laquo; Previous","active":false},{"url":"http:\/\/localhost\/api\/player?page=1","label":"1","active":true},{"url":"http:\/\/localhost\/api\/player?page=2","label":"2","active":false},{"url":"http:\/\/localhost\/api\/player?page=2","label":"Next &raquo;","active":false}],"next_page_url":"http:\/\/localhost\/api\/player?page=2","path":"http:\/\/localhost\/api\/player","per_page":15,"prev_page_url":null,"to":15,"total":20}
     */
    public function index()
    {
        $players = Player::paginate(15);
        return response()->json(
            $players,
            200
        );
    }

    /**
     * Store a new player and return it.
     * @bodyParam pseudo string required The pseudo of the player, max 255 characters. Example: ludicrous
     * @response {"pseudo":"terminator","avatar":"storage\/image\/avatars\/dog","updated_at":"2024-07-31T11:16:16.000000Z","created_at":"2024-07-31T11:16:16.000000Z","id":21}
     */
    public function store(Request $request)
    {
        $data =  $request->json()->all();

        $validator = Validator::make($data, [
            'pseudo' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->getMessages(), 400);
        }

        $player = new Player();
        $player->pseudo = $data['pseudo'];
        $player->avatar = Avatar::getRandomAvatar();

        $player->save();

        return response()->json(
            $player,
            200
        );
    }

    /**
     * Display a specific player.
     * @queryParam id integer required The id of the player
     * @response {"pseudo":"terminator","avatar":"storage\/image\/avatars\/dog","updated_at":"2024-07-31T11:16:16.000000Z","created_at":"2024-07-31T11:16:16.000000Z","id":21}
     */
    public function show(Player $player)
    {
        return response()->json(
            $player,
            200
        );
    }

    /**
     * Update a player and return the new version of it it.
     * @bodyParam pseudo string required The pseudo of the player, max 255 characters. Example: ludicrous
     * @response {"pseudo":"terminator","avatar":"storage\/image\/avatars\/dog","updated_at":"2024-07-31T11:16:16.000000Z","created_at":"2024-07-31T11:16:16.000000Z","id":21}
     */
    public function update(Request $request, Player $player)
    {
        $data =  $request->json()->all();

        $validator = Validator::make($data, [
            'pseudo' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->getMessages(), 400);
        }

        $player->pseudo = $data['pseudo'];
        $player->avatar = Avatar::getRandomAvatar();

        $player->save();

        return response()->json(
            $player,
            200
        );
    }

    /**
     * Delete the specified player and return it.
     * @queryParam id integer required The id of the game
     * @response {"pseudo":"terminator","avatar":"storage\/image\/avatars\/dog","updated_at":"2024-07-31T11:16:16.000000Z","created_at":"2024-07-31T11:16:16.000000Z","id":21}
     */
    public function destroy(Player $player)
    {
        $player->delete();

        return response()->json(
            $player,
            200
        );
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Str as StrIlluminate;
use Psy\Util\Str;

class GameController extends Controller
{
    public function index()
    {

    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $game = Game::where("id", $id)->firstOrFail();
        return response()->json([
            "data" => $game
        ]);
    }

    public function store(Request $request)
    {

        $player = Player::where("user_id", auth()->user()->id)->firstOrFail();
        $slug = $request->name . ' ' . $player->username;

        $game = Game::create([
            'player_id' => $player->id,
            'level_id' => $request->level,
            'category_id' => $request->category,
            'is_private' => $request->isPrivate,
            'name' => $request->name,
            'link' => $slug
        ]);

        $player->game()->attach([
            $game->id => [
                "is_admin" => true
            ]
        ]);

        return response()->json([
            "data" => $game
        ]);
    }
}

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
    public function index(): \Illuminate\Http\JsonResponse
    {
        $games = Game::where("is_private", false)
            ->with("level")
            ->with("category")
            ->with("player")
            ->get();
        return response()->json([
            "data" => $games
        ]);
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $game = Game::where("id", $id)->firstOrFail();
        return response()->json([
            "data" => $game
        ]);
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {

        $player = Player::where("user_id", auth()->user()->id)->firstOrFail();
        $slug = $request->name . ' ' . $player->username;
        $slug = StrIlluminate::slug($slug);

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

    public function join(Request $request)
    {
        $player = Player::where("user_id", auth()->user()->id)->firstOrFail();
        $game = Game::find($request->id);

        $player->game()->attach([
            $game->id => [
                "is_admin" => false
            ]
        ]);
    }

    public function finish(Request $request)
    {
        $user_id = auth()->user()->id;
        $game = Game::find($request->gameId);
        $player = Player::where("user_id", $user_id)->firstOrFail();

        $player->game()->sync([
            $game->id => [
                "bonus" => $request->bonus
            ]
        ]);

        $games = Game::find($request->gameId)
            ->with("players")
            ->get();

        return response()->json([
            "data" => $games
        ]);
    }

}

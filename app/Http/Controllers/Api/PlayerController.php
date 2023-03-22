<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Player;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index(): JsonResponse
    {
        $players = Player::all();
        return response()->json([
            "data" => $players
        ]);
    }

    public function getCurrent(): JsonResponse
    {
        $id = auth()->user()->id;
        $player = Player::where("user_id", $id)->firstOrFail();
        return response()->json([
            "data" => $player
        ]);
    }

    public function show($id): JsonResponse
    {
        $player = Player::where("user_id", $id)->firstOrFail();
        return response()->json([
            "data" => $player
        ]);
    }

    public function store(Request $request)
    {

    }
}

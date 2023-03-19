<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $player = Player::where("user_id", auth()->user()->id)->firstOrFail();
        return view("game.index",compact("player"));
    }

    public function multiple()
    {
        $player = Player::where("user_id", auth()->user()->id)->firstOrFail();
        return view("game.multiple_players.multiple_players",compact("player"));
    }

}

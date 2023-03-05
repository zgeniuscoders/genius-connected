<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class MultiplePlayerController extends Controller
{
    public function show(Request $request){
        $player = Player::where("user_id",auth()->user()->id)->get();
        return view("game.multiple_players.multiple_console",compact("player"));
    }
}

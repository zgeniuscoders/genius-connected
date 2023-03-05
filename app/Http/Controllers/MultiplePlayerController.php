<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MultiplePlayerController extends Controller
{
    public function show(Request $request){
        return view("game.multiple_players.multiple_console");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(){
        return view("game.index");
    }

    public function multiple(){
        return view("game.multiple_players.multiple_players");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view("player.create");
    }

    public function show(Player $id)
    {

    }

    public function store(Request $request)
    {
        $filename = time() . "." . $request->profile->extension();
        $request->file("profile")->storeAs(
            'avatars',
            $filename,
            'public'
        );

        Player::create([
            "user_id" => auth()->user()->id,
            "username" => $request->input("username"),
            "profile" => $filename
        ]);

        dd("oky");

    }

}

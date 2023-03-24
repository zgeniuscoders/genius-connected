<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $senderId = auth()->user()->id;
        $receiverId = $request->input("receiverId");
        $msg = $request->input("message");

        Chat::create([
            "message" => $msg,
            "sender_id" => $senderId,
            "receiver_id" => $receiverId
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $authId = auth()->user()->id;
        $messages = DB::table("chats")
            ->where([
                ['sender_id', "=", $authId],
                ['receiver_id', "=", $id]
            ])->orWhere([
                ['sender_id', "=", $id],
                ['receiver_id', "=", $authId]
            ])
            ->get();

        return response()->json([
            "data" => $messages
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

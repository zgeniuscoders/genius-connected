<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $levels = Level::all();
        return response()->json([
            "data" => $levels
        ]);
    }
}

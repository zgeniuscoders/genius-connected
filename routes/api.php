<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\PlayerController;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\ChatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the api middleware group. Make something great!
|
*/

Route::middleware("auth:sanctum")->group(function () {
    Route::apiResource("games", GameController::class);
    Route::post("games/join", [GameController::class, 'join']);
    Route::post("games/send-result", [GameController::class, 'finish']);

    Route::resource("questions", QuestionController::class);

    Route::apiResource("players", PlayerController::class);
    Route::apiResource("category", CategoryController::class);
    Route::apiResource("level", LevelController::class);
    Route::apiResource("chat", ChatController::class);
    Route::get("player/current", [PlayerController::class, 'getCurrent']);
    Route::get("player/get-player-games", [PlayerController::class, 'getGames']);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

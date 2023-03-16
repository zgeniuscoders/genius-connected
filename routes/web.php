<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MultiplePlayerController;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::middleware("auth")->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.default');
    });
    Route::resource("player", PlayerController::class);
    Route::middleware("isPlayer")->group(function () {
//        Route::get("dashboard", [DashboardController::class, 'index'])->name("dashboard");
        Route::get("jeux", [GameController::class, 'index'])->name("game.home");
        Route::get("jeux/multi-joueurs", [GameController::class, 'multiple'])->name("game.multiples_players");
        Route::get("jeux/multi-joueurs/play_now/{id}", [MultiplePlayerController::class, 'show'])->name("game.multiples_players.console");
        Route::resource("chat", ChatController::class);
    });
});



<?php

use App\Http\Controllers\Api\ChatController;
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

//Route::get("chat",[ChatController::class,'index']);

Route::middleware("auth")->group(function () {
    Route::resource("player", PlayerController::class);

    Route::middleware("isPlayer")->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard.default');
        })->name("dashboard");
        Route::view('{any}', 'dashboard.default')->where('any', '.*');
    });

});



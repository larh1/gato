<?php

use App\Http\Controllers\Gato\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/', function ()
{
    return view('home');
});
Route::get("game/winner/{data}", [GameController::class, "DownloadDocument"]);

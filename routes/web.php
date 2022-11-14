<?php

use App\Http\Controllers\Gato\GameController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "Home"]);
Route::get("game/winner/{data}", [GameController::class, "DownloadDocument"]);

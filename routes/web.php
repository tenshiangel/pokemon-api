<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HatedPokemonController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikedPokemonController;
use App\Http\Controllers\PokemonController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/my-pokemons', [HomeController::class, 'trainer'])->name('trainer-specific');
Route::get('/trainers', [HomeController::class, 'allTrainers'])->name('trainers-list');

Route::group(['prefix' => 'pokemon'], function() {
    Route::get('/user-preference', [PokemonController::class, 'show'])->name('pokemons-user-preference');

    Route::post('/favorite', [FavoriteController::class, 'store'])->name('pokemon-add-favorite');
    Route::post('/like', [LikedPokemonController::class, 'store'])->name('pokemon-add-like');
    Route::post('/hate', [HatedPokemonController::class, 'store'])->name('pokemon-add-hate');
});
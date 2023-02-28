<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HatedPokemonController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikedPokemonController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\UserController;
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

// Trainer-related pages (including the current logged-in user)
Route::get('/my-pokemons', [HomeController::class, 'trainer'])->name('trainer-self');
Route::get('/trainer', [HomeController::class, 'trainer'])->name('trainer-others');
Route::get('/trainers', [HomeController::class, 'allTrainers'])->name('trainers-all');

// User settings
Route::get('/account-settings', [HomeController::class, 'settings'])->name('user-settings');

// User related APIs
Route::get('/user/current', [UserController::class, 'current'])->name('user-current');
Route::get('/users', [UserController::class, 'all'])->name('users-all');
Route::post('/user/update', [UserController::class, 'update'])->name('user-update-details');
Route::post('/user/password/change', [UserController::class, 'changePassword'])->name('users-update-password');

Route::group(['prefix' => 'pokemon'], function() {
    Route::get('/user-preference', [PokemonController::class, 'show'])->name('pokemons-user-preference');

    Route::post('/favorite', [FavoriteController::class, 'store'])->name('pokemon-add-favorite');
    Route::post('/like', [LikedPokemonController::class, 'store'])->name('pokemon-add-like');
    Route::post('/hate', [HatedPokemonController::class, 'store'])->name('pokemon-add-hate');
});
<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserPokemonResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PokemonController extends Controller
{
    /**
     * Get a specific pokemon from the PokeAPI.
     */
    public function getSpecificPokemon(int $pokemon_id)
    {
        $response = Http::get(env('POKEAPI_URL') . "pokemon/" . $pokemon_id);
        return $response->json();
    }

    /**
     * Get all pokemons from the PokeAPI.
     */
    public function getAllPokemons(Request $request)
    {
        $response = Http::get(env('POKEAPI_URL') . "pokemon", [
            'offset' => $request->offset ?? 0,
        ]);
        return $response->json();
    }

    /**
     * Get all pokemons associated with the user.
     */
    public function show(Request $request)
    {
        $user = $request->has('user_id') ? User::find($request->user_id) : Auth::user();
        return new UserPokemonResource($user);
    }
}

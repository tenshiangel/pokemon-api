<?php

namespace App\Http\Controllers;

use App\Http\Requests\LikedPokemonRequest;
use App\Http\Resources\UserPokemonResource;
use App\Models\Pokemon\LikedPokemon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikedPokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LikedPokemonRequest $request)
    {
        $request['user_id'] = $request->user()->id;
        $likedPokemons = $request->user()->likes;

        if ($likedPokemons && count($likedPokemons) >= 3)
            $this->destroy($likedPokemons[0]);
        
        $pokemonReaction = LikedPokemon::create($request->all());
        $pokemonReaction->save();
        
        // return new UserPokemonResource(Auth::user());
        return response()->noContent();
    }

    /**
     * Display the specified resource.
     */
    public function show(LikedPokemon $likedPokemon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LikedPokemon $likedPokemon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LikedPokemon $likedPokemon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LikedPokemon $likedPokemon)
    {
        $likedPokemon->delete();
        return response()->noContent();
    }

    protected function hasExistingLikes(int $pokemon_id): bool
    {
        $condition = false;

        // if (
        //     $pokemonReaction->user_id == $request->user()->id
        //     && $pokemonReaction->pokemon_id == $pokemon_id
        //     && $pokemonReaction->status == $request->status
        // )
        //     $condition = true;
        
        return $condition;
    }
}

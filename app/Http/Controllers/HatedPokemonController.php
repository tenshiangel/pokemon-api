<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserPokemonResource;
use App\Models\Pokemon\HatedPokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HatedPokemonController extends Controller
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
    public function store(Request $request)
    {
        $request['user_id'] = $request->user()->id;
        $hatedPokemons = $request->user()->hates;

        if ($hatedPokemons && count($hatedPokemons) >= 3)
            $this->destroy($hatedPokemons[0]);
        
        $pokemonReaction = HatedPokemon::create($request->all());
        // return response()->json($pokemonReaction);

        return new UserPokemonResource(Auth::user());
    }

    /**
     * Display the specified resource.
     */
    public function show(HatedPokemon $hatedPokemon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HatedPokemon $hatedPokemon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HatedPokemon $hatedPokemon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HatedPokemon $hatedPokemon)
    {
        $hatedPokemon->delete();
        return response()->noContent();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\FavoriteRequest;
use App\Http\Resources\UserPokemonResource;
use App\Models\Pokemon\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
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
    public function store(FavoriteRequest $request)
    {
        $request['user_id'] = $request->user()->id;
        $favorite = $request->user()->favorite;

        if ($favorite)
            return $this->update($request, $favorite);
        
        $favorite = Favorite::create($request->all());
        $favorite->save();

        // return response()->json($favorite);
        return new UserPokemonResource(Auth::user());
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FavoriteRequest $request, Favorite $favorite)
    {
        // $pokemonReaction = Favorite::where('user_id', $favorite->user_id)->first();
        // $pokemonReaction->pokemon_id = $request->pokemon_id;
        $favorite->pokemon_id = $request->pokemon_id;
        $favorite->save();

        // return response()->json($favorite);
        return new UserPokemonResource(Auth::user());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorite $favorite)
    {
        $favorite->delete();
        return response()->noContent();
    }
}

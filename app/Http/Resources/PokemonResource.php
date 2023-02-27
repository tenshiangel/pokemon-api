<?php

namespace App\Http\Resources;

use App\Http\Controllers\PokemonController;
use Illuminate\Http\Resources\Json\JsonResource;

class PokemonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        $pokemon = (new PokemonController)->getSpecificPokemon($this->pokemon_id);

        return [
            'id' => $pokemon['id'],
            'name' => $pokemon['name'],
            'sprites' => $pokemon['sprites'],
            'types' => $pokemon['types'],
            'url' => env('POKEAPI_URL') . 'pokemon/' . $pokemon['id'],
        ];
    }
}

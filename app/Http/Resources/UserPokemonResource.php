<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserPokemonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'favorite' => new PokemonResource($this->favorite),
            // 'likes' => $this->likes->each(function ($pokemon) {
            //     $pokemon = new PokemonResource($pokemon);
            // }),
            // 'hates' => $this->hates->each(function ($pokemon) {
            //     $pokemon = new PokemonResource($pokemon);
            // }),
            'likes' => PokemonResource::collection($this->likes),
            'hates' => PokemonResource::collection($this->hates),
        ];
    }
}

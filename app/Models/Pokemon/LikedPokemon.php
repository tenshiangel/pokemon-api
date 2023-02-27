<?php

namespace App\Models\Pokemon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;

class LikedPokemon extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pokemon_id'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}

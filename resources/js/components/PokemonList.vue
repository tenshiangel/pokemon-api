<script setup>
import usePokemon from '../composables/usePokemon.ts';
import PokemonCard from './PokemonCard.vue';

const { get: getPokemon, userPreference, paginate, pokemons, pagination, likedPokemons } = usePokemon();
userPreference();
getPokemon();
</script>

<template>
    <div class="container">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mx-auto max-w-7xl">
            <PokemonCard v-for="pokemon in pokemons" :pokeapi="pokemon.url" :likes="likedPokemons" />
        </div>
        <div class="mx-auto max-w-7xl">
            <VueAwesomePaginate
                v-model="pagination.page"
                :total-items="pagination.total"
                :items-per-page="pagination.limit"
                :max-pages-shown="5"
                :on-click="paginate"
            />
        </div>
    </div>
</template>

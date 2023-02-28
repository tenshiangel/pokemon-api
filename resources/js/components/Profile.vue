<script setup>
import usePokemon from '../composables/usePokemon.ts';
import { GlobeAsiaAustraliaIcon, FaceFrownIcon } from '@heroicons/vue/24/outline'
import PokemonCard from './PokemonCard.vue';

const { userPreference, likedPokemons, hatedPokemons, favorite, isLoading } = usePokemon();
const props = defineProps(['trainer']);
userPreference(props.trainer);
</script>

<template>
    <div class="container">
        <div class="mx-auto max-w-7xl">
            <div class="flex">
                <div class="flex-none p-4 sm:p-6">
                    <div class="w-full max-w-sm mx-auto space-y-6">                        
                        <div v-if="favorite" class="bg-white border overflow-hidden border-gray-200 rounded-lg shadow">
                            <div class="bg-green-600 relative">
                                <img class="w-full" :src="favorite.sprites?.front_default">
                                <div class="absolute w-full bottom-0 left-0 flex justify-center items-center gap-2 py-2">
                                    <img class="w-8 h-8" src="https://www.serebii.net/pokemongo/goldmedal.png">
                                    <span class="text-2xl text-yellow-300 font-bold uppercase tracking-widest drop-shadow-lg">Favorite</span>
                                </div>
                            </div>
                            
                            <div class="p-4 sm:p-6 text-center space-y-3">
                                <h5 class="text-base font-semibold text-gray-900 capitalize md:text-4xl">
                                    {{ favorite.name }}
                                </h5>
                                <span class="text-sm font-normal text-gray-500">Pokemon #{{ favorite.id }}</span>
                                <div class="space-x-2">
                                    <span v-for="pkTypes in favorite.types"
                                        class="text-blue-500 text-xs uppercase inline-block whitespace-nowrap rounded-full bg-blue-100  px-3 pt-[0.35em] pb-[0.25em] text-center align-baseline font-bold leading-none">
                                        {{ pkTypes.type.name }}
                                    </span>
                                </div>
                                <p class="text-sm font-normal text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Commodo viverra maecenas accumsan lacus vel facilisis volutpat est.</p>
                            </div>

                            <div class="p-4 sm:p-6">
                                <ul class="space-y-3">
                                    <li>
                                        <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-100 hover:bg-gray-200 group hover:shadow">
                                            <img class="h-6 w-auto" src="https://www.freeiconspng.com/thumbs/pokeball-png/file-pokeball-png-0.png" />
                                            <span class="flex-1 ml-3 whitespace-nowrap">Hoenn Region</span>
                                            <span class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-500 bg-gray-200 rounded">Popular</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-100 hover:bg-gray-200 group hover:shadow">
                                            <svg aria-hidden="true" class="h-5" viewBox="0 0 292 292" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M145.7 291.66C226.146 291.66 291.36 226.446 291.36 146C291.36 65.5541 226.146 0.339844 145.7 0.339844C65.2542 0.339844 0.0400391 65.5541 0.0400391 146C0.0400391 226.446 65.2542 291.66 145.7 291.66Z" fill="#3259A5"/><path d="M195.94 155.5C191.49 179.08 170.8 196.91 145.93 196.91C117.81 196.91 95.0204 174.12 95.0204 146C95.0204 117.88 117.81 95.0897 145.93 95.0897C170.8 95.0897 191.49 112.93 195.94 136.5H247.31C242.52 84.7197 198.96 44.1797 145.93 44.1797C89.6904 44.1797 44.1104 89.7697 44.1104 146C44.1104 202.24 89.7004 247.82 145.93 247.82C198.96 247.82 242.52 207.28 247.31 155.5H195.94Z" fill="white"/></svg>
                                            <span class="flex-1 ml-3 whitespace-nowrap">Ability Points</span>
                                            <span class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-500 bg-gray-200 rounded">20+</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div v-else class="bg-white border overflow-hidden border-gray-200 rounded-lg shadow">
                            <div class="flex-1 min-h-full place-items-center py-12 px-6 sm:py-32 lg:px-8">
                                <div class="text-center">
                                    <FaceFrownIcon class="h-20 w-20 block mx-auto" />
                                    <h1 class="text-base font-semibold text-gray-900 md:text-4xl">No favorite</h1>
                                    <p class="mt-2 text-base leading-7 text-gray-600">This trainer has no favorite pokemon.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div v-if="isLoading" class="flex-1 pt-3">
                    <div v-for="index in 2" class="grid grid-cols-1 lg:grid-cols-3 gap-3 mx-auto px-6 py-2">
                        <div v-for="index in 3" class="max-w-sm rounded bg-white overflow-hidden relative shadow-sm">
                            <div class="animate-pulse">
                                <div class="bg-gray-300 w-full pb-[25%]">
                                    <img class="w-full invisible" src="https://wallpapercave.com/wp/xLZrFev.png">
                                </div>
                                <div class="px-6 py-3 mb-16">
                                    <div class="text-center space-y-2 mb-3">
                                        <div class="bg-gray-300 rounded-md font-bold text-xl capitalize">&nbsp;</div>
                                        <p class="bg-gray-300 rounded-md text-sm text-gray-500 mb-0">&nbsp;</p>
                                        <div class="grid grid-cols-2 gap-2">
                                            <span v-for="index in 2" class="bg-gray-300 px-10 rounded-lg">&nbsp;</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 pb-3 absolute bottom-0 w-100">
                                    <div class="text-center">
                                        <button class="bg-gray-300 p-4 rounded-full"></button>
                                    </div>
                                    <div class="text-center">
                                        <button class="bg-gray-300 p-4 rounded-full"></button>
                                    </div>
                                    <div class="text-center">
                                        <button class="bg-gray-300 p-4 rounded-full"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else-if="!isLoading" class="flex-1 pt-3">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 mx-auto px-6 py-2">
                        <PokemonCard v-for="pokemon in likedPokemons" :pokeapi="pokemon.url" :view-only="true" :category="'liked'" />
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 mx-auto px-6 py-2">
                        <PokemonCard v-for="pokemon in hatedPokemons" :pokeapi="pokemon.url" :view-only="true" :category="'hated'" />
                    </div>
                </div>
                <div v-else-if="!isLoading && likedPokemons.length < 1 && hatedPokemons.length < 1" class="flex-1 min-h-full place-items-center py-24 px-6 sm:py-32 lg:px-8">
                    <div class="text-center">
                        <GlobeAsiaAustraliaIcon class="h-36 w-36 block mx-auto" />
                        <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">No Pokemon Interaction</h1>
                        <p class="mt-6 text-base leading-7 text-gray-600">This trainer doesn't seem to have any liked or hated pokemons. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Commodo viverra maecenas accumsan lacus vel facilisis volutpat est.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
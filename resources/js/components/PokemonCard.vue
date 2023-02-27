<script setup>
import usePokemonInteract from '../composables/usePokemonInteract.ts';
import { HandThumbDownIcon, HandThumbUpIcon, StarIcon, NoSymbolIcon, QuestionMarkCircleIcon } from '@heroicons/vue/24/outline'

const props = defineProps(['pokeapi', 'likes', 'viewOnly', 'category'])
const { get: getPokemon, setAsLike, setAsHate, setAsFavorite, pokemon, isLoading, process } = usePokemonInteract()
getPokemon(props.pokeapi);
</script>

<template>
    <div v-if="isLoading" class="max-w-sm rounded bg-white overflow-hidden relative shadow-sm">
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
    
    <div v-else class="max-w-sm rounded bg-white overflow-hidden relative shadow-sm">
        <div v-if="pokemon.sprites.front_default != null" :class="[category == 'hated' ? 'bg-red-400' : 'bg-blue-400', 'relative']">
            <img class="w-full" :src="pokemon.sprites.front_default">
            <span v-if="category"
                :class="[category == 'hated' ? 'text-red-100 bg-red-600' : 'text-blue-100 bg-blue-600','absolute top-3 left-3 tracking-widest text-xs uppercase inline-block whitespace-nowrap rounded-full px-3 py-[0.35em] text-center align-baseline font-bold leading-none']">
                {{ category }}
            </span>
        </div>
        <div v-else :class="[category == 'hated' ? 'bg-red-400' : 'bg-blue-400', 'grid justify-items-center relative']">
            <QuestionMarkCircleIcon class="text-gray-300" />
            <span v-if="category"
                :class="[category == 'hated' ? 'text-red-100 bg-red-600' : 'text-blue-100 bg-blue-600','absolute top-3 left-3 tracking-widest text-xs uppercase inline-block whitespace-nowrap rounded-full px-3 py-[0.35em] text-center align-baseline font-bold leading-none']">
                {{ category }}
            </span>
        </div>
        <div :class="[!viewOnly ? 'mb-16' : '', 'px-6 py-3']">
            <div class="text-center space-y-2 mb-3">
                <div class="font-bold text-xl capitalize">{{ pokemon.name }}</div>
                <span class="font-medium text-sm text-gray-500">Pokemon #{{ pokemon.id }}</span>
                <div class="space-x-2">
                    <span v-for="pkTypes in pokemon.types"
                        class="text-blue-500 text-xs uppercase inline-block whitespace-nowrap rounded-full bg-blue-100  px-3 pt-[0.35em] pb-[0.25em] text-center align-baseline font-bold leading-none">
                        {{ pkTypes.type.name }}
                    </span>
                </div>
            </div>
        </div>
        <div v-if="!viewOnly" class="grid grid-cols-3 pb-3 absolute bottom-0 w-100">
            <div class="text-center">
                <button @click="setAsLike()" class="hover:text-blue-500 p-3 rounded-full disabled:cursor-not-allowed" :disabled="process.loading">
                    <svg v-if="process.loading && process.action == 'like'" class="animate-spin block -ml-1 h-6 w-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <NoSymbolIcon v-else-if="process.loading && process.action != 'like'" class="block h-6 w-6 text-red-700" aria-hidden="true" />
                    <HandThumbUpIcon v-else class="block h-6 w-6" aria-hidden="true" />
                </button>
            </div>
            <div class="text-center">
                <button @click="setAsHate()" class="hover:text-blue-500 p-3 rounded-full disabled:cursor-not-allowed" :disabled="process.loading">
                    <svg v-if="process.loading && process.action == 'hate'" class="animate-spin block -ml-1 h-6 w-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <NoSymbolIcon v-else-if="process.loading && process.action != 'hate'" class="block h-6 w-6 text-red-700" aria-hidden="true" />
                    <HandThumbDownIcon v-else class="block h-6 w-6" aria-hidden="true" />
                </button>
            </div>
            <div class="text-center">
                <button @click="setAsFavorite()" class="hover:text-blue-500 p-3 rounded-full disabled:cursor-not-allowed" :disabled="process.loading">
                    <svg v-if="process.loading && process.action == 'favorite'" class="animate-spin block -ml-1 h-6 w-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <NoSymbolIcon v-else-if="process.loading && process.action != 'favorite'" class="block h-6 w-6 text-red-700" aria-hidden="true" />
                    <StarIcon v-else class="block h-6 w-6" aria-hidden="true" />
                </button>
            </div>
        </div>
    </div>
</template>
<script setup>
import useTrainer from '../composables/useTrainer.ts';
// import PokemonCard from './PokemonCard.vue';

const { get: getAllTrainers, trainers, isLoading } = useTrainer();
getAllTrainers();
</script>

<template>
    <div class="container">
        <div class="mx-auto max-w-7xl">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Birthdate
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="trainer in trainers" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full">
                                <span class="font-medium text-gray-600">{{ trainer.initials }}</span>
                            </div>
                            <div class="pl-3">
                                <div class="text-base font-semibold">{{ trainer.name }}</div>
                                <div class="font-normal text-gray-500">{{ trainer.email }}</div>
                            </div>  
                        </th>
                        <td class="px-6 py-4">
                            {{ trainer.birthdate }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Online
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <a :href="'/trainer?user_id=' + trainer.id" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View Profile</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
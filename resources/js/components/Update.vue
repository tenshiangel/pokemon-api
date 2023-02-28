<script setup>
import useUpdate from '../composables/useUpdate.ts'

const { get: getUser, user, passcode, errors, isLoading, updateDetails, updatePassword } = useUpdate()
getUser();
</script>

<template>
    <div class="container">
        <div class="mx-auto max-w-7xl">
            <div class="rounded-lg p-10 bg-white overflow-hidden relative shadow-sm">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <!-- Update details -->
                    <div class="mb-5 space-y-6 md:pr-10 md:mb-0">
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                            Update your account
                        </h1>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                                <input v-model="user.first_name" type="text" id="first-name" :class="[errors.first_name ? 'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-gray-50 border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500', 'border shadow-sm text-sm rounded-lg block w-full p-2.5']" placeholder="First name" required>
                            </div>
                            <div>
                                <label for="last-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                                <input v-model="user.last_name" type="text" id="last-name" :class="[errors.last_name ? 'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-gray-50 border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500', 'border shadow-sm text-sm rounded-lg block w-full p-2.5']" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div>
                            <label for="birthdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birthdate</label>
                            <input v-model="user.birthdate" type="date" id="birthdate" :class="[errors.birthdate ? 'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-gray-50 border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500', 'border shadow-sm text-sm rounded-lg block w-full p-2.5']" placeholder="Last Name" required>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input v-model="user.email" type="email" id="email" :class="[errors.email ? 'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-gray-50 border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500', 'border shadow-sm text-sm rounded-lg block w-full p-2.5']" placeholder="name@company.com" required>
                        </div>
                        <button @click="updateDetails()"
                            :disabled="isLoading"
                            type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Update account
                        </button>
                    </div>

                    <!-- Update password -->
                    <div class="space-y-6 md:pl-10">
                        <!-- bg-red-50 border border-red-500 text-red-900 placeholder-red-700 -->
                        <!-- <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> Username already taken!</p> -->
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                            Update your password
                        </h1>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New password</label>
                            <input v-model="passcode.password" type="password" id="password" :class="[errors.password ? 'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-gray-50 border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500', 'border shadow-sm text-sm rounded-lg block w-full p-2.5']" placeholder="••••••••" required>
                        </div>
                        <div>
                            <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repeat password</label>
                            <input v-model="passcode.password_confirmation" type="password" id="repeat-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="••••••••" required>
                        </div>
                        <div class="invisible">
                            <label for="placeholder-only" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repeat password</label>
                            <input type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <button @click="updatePassword()"
                            :disabled="isLoading"
                            type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Update Password
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
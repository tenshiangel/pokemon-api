<script setup>
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { Bars3Icon, BellIcon, XMarkIcon, UserCircleIcon } from '@heroicons/vue/24/outline'
import useNavigation from '../composables/useNavigation.ts'

const { logout, menus } = useNavigation()
const props = defineProps(['userName']);
console.log(props.userName);
</script>

<template>
    <Disclosure as="nav" class="bg-gray-800 sticky top-0 z-10" v-slot="{ open }">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <DisclosureButton class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <span class="sr-only">Open main menu</span>
                    <Bars3Icon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
                    <XMarkIcon v-else class="block h-6 w-6" aria-hidden="true" />
                </DisclosureButton>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <a href="/home" class="flex flex-shrink-0 items-center cursor-pointer">
                    <img class="block h-8 w-auto lg:hidden" src="https://www.freeiconspng.com/thumbs/pokeball-png/file-pokeball-png-0.png" alt="PokeAPI" />
                    <img class="hidden h-8 w-auto lg:block" src="https://www.freeiconspng.com/thumbs/pokeball-png/file-pokeball-png-0.png" alt="PokeAPI" />
                </a>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-3">
                        <a v-for="item in menus" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'px-3 py-2 rounded-md text-sm font-medium']" :aria-current="item.current ? 'page' : undefined">{{ item.name }}</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification" class="group inline-flex items-center text-sm font-medium text-center text-gray-400 hover:text-white focus:outline-none dark:hover:text-white dark:text-gray-400" type="button"> 
                    <BellIcon class="h-6 w-6" aria-hidden="true" />
                    <div class="relative flex">
                        <div class="relative inline-flex w-3 h-3 bg-red-500 border-2 border-red-500 rounded-full -top-2 right-3 group-hover:border-white"></div>
                    </div>
                </button>

                <div id="dropdownNotification" class="z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow" aria-labelledby="dropdownNotificationButton">
                    <div class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 dark:bg-gray-800 dark:text-white">
                        Notifications
                    </div>
                    <div class="divide-y divide-gray-100 dark:divide-gray-700">
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="flex-shrink-0">
                                <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full">
                                    <span class="font-medium text-gray-600 dark:text-gray-300">JL</span>
                                </div>
                                <div class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-blue-600 border border-white rounded-full">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
                                </div>
                            </div>
                            <div class="w-full pl-3">
                                <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">New message from <span class="font-semibold text-gray-900 dark:text-white">Jese Leos</span>: "Hey, what's up? All set for the presentation?"</div>
                                <div class="text-xs text-blue-600 dark:text-blue-500">a few moments ago</div>
                            </div>
                        </a>
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="flex-shrink-0">
                                <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full">
                                    <span class="font-medium text-gray-600 dark:text-gray-300">JM</span>
                                </div>
                                <div class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-gray-900 border border-white rounded-full">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path></svg>
                                </div>
                            </div>
                            <div class="w-full pl-3">
                                <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Joseph Mcfall</span> and <span class="font-medium text-gray-900 dark:text-white">5 others</span> started following you.</div>
                                <div class="text-xs text-blue-600 dark:text-blue-500">10 minutes ago</div>
                            </div>
                        </a>
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="flex-shrink-0">
                                <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full">
                                    <span class="font-medium text-gray-600 dark:text-gray-300">BG</span>
                                </div>
                                <div class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-red-600 border border-white rounded-full">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                                </div>
                            </div>
                            <div class="w-full pl-3">
                                <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Bonnie Green</span> and <span class="font-medium text-gray-900 dark:text-white">141 others</span> love your story. See it and view more stories.</div>
                                <div class="text-xs text-blue-600 dark:text-blue-500">44 minutes ago</div>
                            </div>
                        </a>
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="flex-shrink-0">
                                <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full">
                                    <span class="font-medium text-gray-600 dark:text-gray-300">LL</span>
                                </div>
                                <div class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-green-400 border border-white rounded-full">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                </div>
                            </div>
                            <div class="w-full pl-3">
                                <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Leslie Livingston</span> mentioned you in a comment: <span class="font-medium text-blue-500" href="#">@bonnie.green</span> what do you say?</div>
                                <div class="text-xs text-blue-600 dark:text-blue-500">1 hour ago</div>
                            </div>
                        </a>
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="flex-shrink-0">
                                <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full">
                                    <span class="font-medium text-gray-600 dark:text-gray-300">RB</span>
                                </div>
                                <div class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-purple-500 border border-white rounded-full">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                                </div>
                            </div>
                            <div class="w-full pl-3">
                                <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Robert Brown</span> posted a new video: Glassmorphism - learn how to implement the new design trend.</div>
                                <div class="text-xs text-blue-600 dark:text-blue-500">3 hours ago</div>
                            </div>
                        </a>
                    </div>
                    <a href="#" class="block py-2 text-sm font-medium text-center text-gray-900 rounded-b-lg bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">
                        <div class="inline-flex items-center ">
                        <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                            View all
                        </div>
                    </a>
                </div>
    
                <Menu as="div" class="relative ml-3 z-12">
                    <div>
                        <MenuButton class="flex justify-center items-center rounded-full bg-gray-800 py-1 pr-2 text-gray-400 hover:text-white focus:outline-none">
                            <UserCircleIcon class="h-8 w-8 mr-3" />
                            <span >{{ userName }}</span>
                        </MenuButton>
                    </div>
                    <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                        <MenuItems class="absolute right-0 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <MenuItem v-slot="{ active }">
                                <a href="#" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700 cursor-pointer']">Profile Settings</a>
                            </MenuItem>
                            <MenuItem v-slot="{ active }">
                                <a @click="logout()" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700 cursor-pointer']">Sign out</a>
                            </MenuItem>
                        </MenuItems>
                    </transition>
                </Menu>
            </div>
            </div>
        </div>
    
        <DisclosurePanel class="sm:hidden">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <DisclosureButton v-for="item in menus" :key="item.name" :as="item.asElem" :href="item.href" :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'block px-3 py-2 rounded-md text-base font-medium']" :aria-current="item.current ? 'page' : undefined">{{ item.name }}</DisclosureButton>
            </div>
        </DisclosurePanel>
    </Disclosure>

    <!-- <ProfileModal /> -->
</template>

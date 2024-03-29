<x-layout>
    <div class="h-full bg-gray-100">

        <!--
    This example requires updating your template:
  
    ```
    <html class="h-full bg-gray-100">
    <body class="h-full overflow-hidden">
    ```
    -->
        <div class="flex h-full flex-col">
            <!-- Top nav-->
            <header x-data="{ open: false }" @keydown.window.escape="open = false"
                class="relative flex h-16 flex-shrink-0 items-center bg-white">
                <!-- Logo area -->
                <div class="absolute inset-y-0 left-0 lg:static lg:flex-shrink-0">
                    <a href="#"
                        class="flex h-16 w-16 items-center justify-center bg-cyan-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-600 lg:w-20">
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=white"
                            alt="Your Company">
                    </a>
                </div>

                <!-- Picker area -->
                <div class="mx-auto lg:hidden">
                    <div class="relative">
                        <label for="inbox-select" class="sr-only">Choose inbox</label>
                        <select id="inbox-select"
                            class="rounded-md border-0 bg-none pl-3 pr-8 text-base font-medium text-gray-900 focus:ring-2 focus:ring-blue-600">
                            <option value="/open">Open</option>
                            <option value="/archived">Archived</option>
                            <option value="/assigned">Assigned</option>
                            <option value="/flagged">Flagged</option>
                            <option value="/spam">Spam</option>
                            <option value="/drafts">Drafts</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center justify-center pr-2">
                            <svg class="h-5 w-5 text-gray-500" x-description="Heroicon name: mini/chevron-down"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Menu button area -->
                <div class="absolute inset-y-0 right-0 flex items-center pr-4 sm:pr-6 lg:hidden">
                    <!-- Mobile menu button -->
                    <button type="button"
                        class="-mr-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-600"
                        @click="open = true">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" x-description="Heroicon name: outline/bars-3"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                        </svg>
                    </button>
                </div>

                <!-- Desktop nav area -->
                <div class="hidden lg:flex lg:min-w-0 lg:flex-1 lg:items-center lg:justify-between">
                    <div class="min-w-0 flex-1">
                        <div class="relative max-w-2xl text-gray-400 focus-within:text-gray-500">
                            <label for="desktop-search" class="sr-only">Search all inboxes</label>
                            <input id="desktop-search" type="search" placeholder="Search all inboxes"
                                class="block w-full border-transparent pl-12 placeholder-gray-500 focus:border-transparent focus:ring-0 sm:text-sm">
                            <div
                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center justify-center pl-4">
                                <svg class="h-5 w-5" x-description="Heroicon name: mini/magnifying-glass"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="ml-10 flex flex-shrink-0 items-center space-x-10 pr-4">
                        <nav aria-label="Global" class="flex space-x-10">


                            <div x-data="Components.menu({ open: false })" x-init="init()"
                                @keydown.escape.stop="open = false; focusButton()" @click.away="onClickAway($event)"
                                class="relative text-left">
                                <button type="button"
                                    class="flex items-center rounded-md text-sm font-medium text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2"
                                    id="menu-0-button" x-ref="button" @click="onButtonClick()"
                                    @keyup.space.prevent="onButtonEnter()" @keydown.enter.prevent="onButtonEnter()"
                                    aria-expanded="false" aria-haspopup="true" x-bind:aria-expanded="open.toString()"
                                    @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()">
                                    <span>Inboxes</span>
                                    <svg class="ml-1 h-5 w-5 text-gray-500"
                                        x-description="Heroicon name: mini/chevron-down"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>


                                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    x-ref="menu-items" x-description="Dropdown menu, show/hide based on menu state."
                                    x-bind:aria-activedescendant="activeDescendant" role="menu"
                                    aria-orientation="vertical" aria-labelledby="menu-0-button" tabindex="-1"
                                    @keydown.arrow-up.prevent="onArrowUp()"
                                    @keydown.arrow-down.prevent="onArrowDown()" @keydown.tab="open = false"
                                    @keydown.enter.prevent="open = false; focusButton()"
                                    @keyup.space.prevent="open = false; focusButton()">
                                    <div class="py-1" role="none">

                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700"
                                            x-state:on="Active" x-state:off="Not Active"
                                            :class="{ 'bg-gray-100': activeIndex === 0 }" role="menuitem"
                                            tabindex="-1" id="menu-0-item-0" @mouseenter="onMouseEnter($event)"
                                            @mousemove="onMouseMove($event, 0)" @mouseleave="onMouseLeave($event)"
                                            @click="open = false; focusButton()">Technical Support</a>

                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700"
                                            :class="{ 'bg-gray-100': activeIndex === 1 }" role="menuitem"
                                            tabindex="-1" id="menu-0-item-1" @mouseenter="onMouseEnter($event)"
                                            @mousemove="onMouseMove($event, 1)" @mouseleave="onMouseLeave($event)"
                                            @click="open = false; focusButton()">Sales</a>

                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700"
                                            :class="{ 'bg-gray-100': activeIndex === 2 }" role="menuitem"
                                            tabindex="-1" id="menu-0-item-2" @mouseenter="onMouseEnter($event)"
                                            @mousemove="onMouseMove($event, 2)" @mouseleave="onMouseLeave($event)"
                                            @click="open = false; focusButton()">General</a>

                                    </div>
                                </div>

                            </div>


                            <a href="#" class="text-sm font-medium text-gray-900">Items</a>


                            <a href="#" class="text-sm font-medium text-gray-900">Settings</a>

                        </nav>
                        <div class="flex items-center space-x-8">
                            <span class="inline-flex">
                                <a href="#"
                                    class="-mx-1 rounded-full bg-white p-1 text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">View notifications</span>
                                    <svg class="h-6 w-6" x-description="Heroicon name: outline/bell"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0">
                                        </path>
                                    </svg>
                                </a>
                            </span>

                            <div x-data="Components.menu({ open: false })" x-init="init()"
                                @keydown.escape.stop="open = false; focusButton()" @click.away="onClickAway($event)"
                                class="relative inline-block text-left">
                                <button type="button"
                                    class="flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2"
                                    id="menu-1-button" x-ref="button" @click="onButtonClick()"
                                    @keyup.space.prevent="onButtonEnter()" @keydown.enter.prevent="onButtonEnter()"
                                    aria-expanded="false" aria-haspopup="true" x-bind:aria-expanded="open.toString()"
                                    @keydown.arrow-up.prevent="onArrowUp()"
                                    @keydown.arrow-down.prevent="onArrowDown()">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full"
                                        src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                        alt="">
                                </button>


                                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    x-ref="menu-items" x-description="Dropdown menu, show/hide based on menu state."
                                    x-bind:aria-activedescendant="activeDescendant" role="menu"
                                    aria-orientation="vertical" aria-labelledby="menu-1-button" tabindex="-1"
                                    @keydown.arrow-up.prevent="onArrowUp()"
                                    @keydown.arrow-down.prevent="onArrowDown()" @keydown.tab="open = false"
                                    @keydown.enter.prevent="open = false; focusButton()"
                                    @keyup.space.prevent="open = false; focusButton()">
                                    <div class="py-1" role="none">
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700"
                                            x-state:on="Active" x-state:off="Not Active"
                                            :class="{ 'bg-gray-100': activeIndex === 0 }" role="menuitem"
                                            tabindex="-1" id="menu-1-item-0" @mouseenter="onMouseEnter($event)"
                                            @mousemove="onMouseMove($event, 0)" @mouseleave="onMouseLeave($event)"
                                            @click="open = false; focusButton()">Your Profile</a>
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700"
                                            :class="{ 'bg-gray-100': activeIndex === 1 }" role="menuitem"
                                            tabindex="-1" id="menu-1-item-1" @mouseenter="onMouseEnter($event)"
                                            @mousemove="onMouseMove($event, 1)" @mouseleave="onMouseLeave($event)"
                                            @click="open = false; focusButton()">Sign Out</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu, show/hide this `div` based on menu open/closed state -->

                <div x-show="open" class="relative z-40 lg:hidden" x-ref="dialog" aria-modal="true">

                    <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="transition-opacity ease-linear duration-300"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                        x-description="Off-canvas menu backdrop, show/hide based on off-canvas menu state."
                        class="hidden sm:fixed sm:inset-0 sm:block sm:bg-gray-600 sm:bg-opacity-75"></div>


                    <div class="fixed inset-0 z-40">

                        <div x-show="open"
                            x-transition:enter="transition ease-out duration-150 sm:ease-in-out sm:duration-300"
                            x-transition:enter-start="transform opacity-0 scale-110 sm:translate-x-full sm:scale-100 sm:opacity-100"
                            x-transition:enter-end="transform opacity-100 scale-100 sm:translate-x-0 sm:scale-100 sm:opacity-100"
                            x-transition:leave="transition ease-in duration-150 sm:ease-in-out sm:duration-300"
                            x-transition:leave-start="transform opacity-100 scale-100 sm:translate-x-0 sm:scale-100 sm:opacity-100"
                            x-transition:leave-end="transform opacity-0 scale-110 sm:translate-x-full sm:scale-100 sm:opacity-100"
                            x-description="Mobile menu, toggle classes based on menu state."
                            class="fixed inset-0 z-40 h-full w-full bg-white sm:inset-y-0 sm:left-auto sm:right-0 sm:w-full sm:max-w-sm sm:shadow-lg"
                            aria-label="Global" @click.away="open = false">
                            <div class="flex h-16 items-center justify-between px-4 sm:px-6">
                                <a href="#">
                                    <img class="block h-8 w-auto" src="." alt="Your title">
                                </a>
                                <button type="button"
                                    class="-mr-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-600"
                                    @click="open = false">
                                    <span class="sr-only">Close main menu</span>
                                    <svg class="block h-6 w-6" x-description="Heroicon name: outline/x-mark"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <div class="max-w-8xl mx-auto mt-2 px-4 sm:px-6">
                                <div class="relative text-gray-400 focus-within:text-gray-500">
                                    <label for="mobile-search" class="sr-only">Search all inboxes</label>
                                    <input id="mobile-search" type="search" placeholder="Search all inboxes"
                                        class="block w-full rounded-md border-gray-300 pl-10 placeholder-gray-500 focus:border-blue-600 focus:ring-blue-600">
                                    <div class="absolute inset-y-0 left-0 flex items-center justify-center pl-3">
                                        <svg class="h-5 w-5" x-description="Heroicon name: mini/magnifying-glass"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="max-w-8xl mx-auto px-2 py-3 sm:px-4">

                                <a href="#"
                                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100">Inboxes</a>

                                <a href="#"
                                    class="block rounded-md py-2 pl-5 pr-3 text-base font-medium text-gray-500 hover:bg-gray-100">Technical
                                    Support</a>

                                <a href="#"
                                    class="block rounded-md py-2 pl-5 pr-3 text-base font-medium text-gray-500 hover:bg-gray-100">Sales</a>

                                <a href="#"
                                    class="block rounded-md py-2 pl-5 pr-3 text-base font-medium text-gray-500 hover:bg-gray-100">General</a>


                                <a href="#"
                                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100">Reporting</a>


                                <a href="#"
                                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100">Settings</a>


                            </div>
                            <div class="border-t border-gray-200 pb-3 pt-4">
                                <div class="max-w-8xl mx-auto flex items-center px-4 sm:px-6">
                                    <div class="flex-shrink-0">
                                        <img class="h-10 w-10 rounded-full"
                                            src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                            alt="">
                                    </div>
                                    <div class="ml-3 min-w-0 flex-1">
                                        <div class="truncate text-base font-medium text-gray-800">Whitney Francis</div>
                                        <div class="truncate text-sm font-medium text-gray-500">
                                            whitney.francis@example.com
                                        </div>
                                    </div>
                                    <a href="#"
                                        class="ml-auto flex-shrink-0 bg-white p-2 text-gray-400 hover:text-gray-500">
                                        <span class="sr-only">View notifications</span>
                                        <svg class="h-6 w-6" x-description="Heroicon name: outline/bell"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="max-w-8xl mx-auto mt-3 space-y-1 px-2 sm:px-4">

                                    <a href="#"
                                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-50">Your
                                        Profile</a>

                                    <a href="#"
                                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-50">Sign
                                        out</a>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </header>

            <!-- Bottom section -->
            <div class="flex min-h-0 flex-1 overflow-hidden">
                <!-- Narrow sidebar-->
                <nav aria-label="Sidebar" class="hidden lg:block lg:flex-shrink-0 lg:overflow-y-auto lg:bg-gray-800">
                    <div class="relative flex w-20 flex-col space-y-3 p-3">

                        <a href="#"
                            class="inline-flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-lg bg-gray-900 text-white">
                            <span class="sr-only">Open</span>
                            <svg class="h-6 w-6" x-description="Heroicon name: outline/inbox"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z">
                                </path>
                            </svg>
                        </a>

                        <a href="#"
                            class="inline-flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-lg text-gray-400 hover:bg-gray-700">
                            <span class="sr-only">Archive</span>
                            <svg class="h-6 w-6" x-description="Heroicon name: outline/archive-box"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z">
                                </path>
                            </svg>
                        </a>

                        <a href="#"
                            class="inline-flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-lg text-gray-400 hover:bg-gray-700">
                            <span class="sr-only">Customers</span>
                            <svg class="h-6 w-6" x-description="Heroicon name: outline/user-circle"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z">
                                </path>
                            </svg>
                        </a>

                        <a href="#"
                            class="inline-flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-lg text-gray-400 hover:bg-gray-700">
                            <span class="sr-only">Flagged</span>
                            <svg class="h-6 w-6" x-description="Heroicon name: outline/flag"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3v1.5M3 21v-6m0 0l2.77-.693a9 9 0 016.208.682l.108.054a9 9 0 006.086.71l3.114-.732a48.524 48.524 0 01-.005-10.499l-3.11.732a9 9 0 01-6.085-.711l-.108-.054a9 9 0 00-6.208-.682L3 4.5M3 15V4.5">
                                </path>
                            </svg>
                        </a>

                        <a href="#"
                            class="inline-flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-lg text-gray-400 hover:bg-gray-700">
                            <span class="sr-only">Spam</span>
                            <svg class="h-6 w-6" x-description="Heroicon name: outline/no-symbol"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
                                </path>
                            </svg>
                        </a>

                        <a href="#"
                            class="inline-flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-lg text-gray-400 hover:bg-gray-700">
                            <span class="sr-only">Drafts</span>
                            <svg class="h-6 w-6" x-description="Heroicon name: outline/pencil-square"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10">
                                </path>
                            </svg>
                        </a>

                    </div>
                </nav>

                <!-- Main area -->
                <main class="min-w-0 flex-1 border-t border-gray-200 xl:flex">
                    <section aria-labelledby="message-heading"
                        class="flex h-full min-w-0 flex-1 flex-col overflow-hidden xl:order-last">
                        <!-- Top section -->
                        <div class="flex-shrink-0 border-b border-gray-200 bg-white">
                            <!-- Toolbar-->
                            <div class="flex h-16 flex-col justify-center">
                                <div class="px-4 sm:px-6 lg:px-8">
                                    <div class="flex justify-between py-3">
                                        <!-- Left buttons -->
                                        <div>
                                            <div
                                                class="isolate inline-flex rounded-md shadow-sm sm:space-x-3 sm:shadow-none">
                                                <span class="inline-flex sm:shadow-sm">
                                                    <button type="button"
                                                        class="relative inline-flex items-center rounded-l-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50 focus:z-10 focus:border-blue-600 focus:outline-none focus:ring-1 focus:ring-blue-600">
                                                        <svg class="mr-2.5 h-5 w-5 text-gray-400"
                                                            x-description="Heroicon name: mini/arrow-uturn-left"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                            fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                d="M7.793 2.232a.75.75 0 01-.025 1.06L3.622 7.25h10.003a5.375 5.375 0 010 10.75H10.75a.75.75 0 010-1.5h2.875a3.875 3.875 0 000-7.75H3.622l4.146 3.957a.75.75 0 01-1.036 1.085l-5.5-5.25a.75.75 0 010-1.085l5.5-5.25a.75.75 0 011.06.025z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span>Reply</span>
                                                    </button>
                                                    <button type="button"
                                                        class="relative -ml-px hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50 focus:z-10 focus:border-blue-600 focus:outline-none focus:ring-1 focus:ring-blue-600 sm:inline-flex">
                                                        <svg class="mr-2.5 h-5 w-5 text-gray-400"
                                                            x-description="Heroicon name: mini/pencil"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                            fill="currentColor" aria-hidden="true">
                                                            <path
                                                                d="M2.695 14.763l-1.262 3.154a.5.5 0 00.65.65l3.155-1.262a4 4 0 001.343-.885L17.5 5.5a2.121 2.121 0 00-3-3L3.58 13.42a4 4 0 00-.885 1.343z">
                                                            </path>
                                                        </svg>
                                                        <span>Note</span>
                                                    </button>
                                                    <button type="button"
                                                        class="relative -ml-px hidden items-center rounded-r-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50 focus:z-10 focus:border-blue-600 focus:outline-none focus:ring-1 focus:ring-blue-600 sm:inline-flex">
                                                        <svg class="mr-2.5 h-5 w-5 text-gray-400"
                                                            x-description="Heroicon name: mini/user-plus"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                            fill="currentColor" aria-hidden="true">
                                                            <path
                                                                d="M11 5a3 3 0 11-6 0 3 3 0 016 0zM2.615 16.428a1.224 1.224 0 01-.569-1.175 6.002 6.002 0 0111.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 018 18a9.953 9.953 0 01-5.385-1.572zM16.25 5.75a.75.75 0 00-1.5 0v2h-2a.75.75 0 000 1.5h2v2a.75.75 0 001.5 0v-2h2a.75.75 0 000-1.5h-2v-2z">
                                                            </path>
                                                        </svg>
                                                        <span>Assign</span>
                                                    </button>
                                                </span>

                                                <span class="hidden space-x-3 lg:flex">
                                                    <button type="button"
                                                        class="relative -ml-px hidden items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50 focus:z-10 focus:border-blue-600 focus:outline-none focus:ring-1 focus:ring-blue-600 sm:inline-flex">
                                                        <svg class="mr-2.5 h-5 w-5 text-gray-400"
                                                            x-description="Heroicon name: mini/archive-box"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                            fill="currentColor" aria-hidden="true">
                                                            <path
                                                                d="M2 3a1 1 0 00-1 1v1a1 1 0 001 1h16a1 1 0 001-1V4a1 1 0 00-1-1H2z">
                                                            </path>
                                                            <path fill-rule="evenodd"
                                                                d="M2 7.5h16l-.811 7.71a2 2 0 01-1.99 1.79H4.802a2 2 0 01-1.99-1.79L2 7.5zM7 11a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span>Archive</span>
                                                    </button>
                                                    <button type="button"
                                                        class="relative -ml-px hidden items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50 focus:z-10 focus:border-blue-600 focus:outline-none focus:ring-1 focus:ring-blue-600 sm:inline-flex">
                                                        <svg class="mr-2.5 h-5 w-5 text-gray-400"
                                                            x-description="Heroicon name: mini/folder-arrow-down"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                            fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                d="M2 4.75C2 3.784 2.784 3 3.75 3h4.836c.464 0 .909.184 1.237.513l1.414 1.414a.25.25 0 00.177.073h4.836c.966 0 1.75.784 1.75 1.75v8.5A1.75 1.75 0 0116.25 17H3.75A1.75 1.75 0 012 15.25V4.75zm8.75 4a.75.75 0 00-1.5 0v2.546l-.943-1.048a.75.75 0 10-1.114 1.004l2.25 2.5a.75.75 0 001.114 0l2.25-2.5a.75.75 0 10-1.114-1.004l-.943 1.048V8.75z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span>Move</span>
                                                    </button>
                                                </span>

                                                <div x-data="Components.menu({ open: false })" x-init="init()"
                                                    @keydown.escape.stop="open = false; focusButton()"
                                                    @click.away="onClickAway($event)"
                                                    class="relative -ml-px block sm:shadow-sm lg:hidden">
                                                    <div>
                                                        <button type="button"
                                                            class="relative inline-flex items-center rounded-r-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50 focus:z-10 focus:border-blue-600 focus:outline-none focus:ring-1 focus:ring-blue-600 sm:rounded-md sm:px-3"
                                                            id="menu-2-button" x-ref="button"
                                                            @click="onButtonClick()"
                                                            @keyup.space.prevent="onButtonEnter()"
                                                            @keydown.enter.prevent="onButtonEnter()"
                                                            aria-expanded="false" aria-haspopup="true"
                                                            x-bind:aria-expanded="open.toString()"
                                                            @keydown.arrow-up.prevent="onArrowUp()"
                                                            @keydown.arrow-down.prevent="onArrowDown()">
                                                            <span class="sr-only sm:hidden">More</span>
                                                            <span class="hidden sm:inline">More</span>
                                                            <svg class="h-5 w-5 text-gray-400 sm:-mr-1 sm:ml-2"
                                                                x-description="Heroicon name: mini/chevron-down"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd"
                                                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                        </button>
                                                    </div>


                                                    <div x-show="open"
                                                        x-transition:enter="transition ease-out duration-100"
                                                        x-transition:enter-start="transform opacity-0 scale-95"
                                                        x-transition:enter-end="transform opacity-100 scale-100"
                                                        x-transition:leave="transition ease-in duration-75"
                                                        x-transition:leave-start="transform opacity-100 scale-100"
                                                        x-transition:leave-end="transform opacity-0 scale-95"
                                                        class="absolute right-0 z-10 mt-2 w-36 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                                        x-ref="menu-items"
                                                        x-description="Dropdown menu, show/hide based on menu state."
                                                        x-bind:aria-activedescendant="activeDescendant" role="menu"
                                                        aria-orientation="vertical" aria-labelledby="menu-2-button"
                                                        tabindex="-1" @keydown.arrow-up.prevent="onArrowUp()"
                                                        @keydown.arrow-down.prevent="onArrowDown()"
                                                        @keydown.tab="open = false"
                                                        @keydown.enter.prevent="open = false; focusButton()"
                                                        @keyup.space.prevent="open = false; focusButton()">
                                                        <div class="py-1" role="none">
                                                            <a href="#"
                                                                class="block px-4 py-2 text-sm text-gray-700 sm:hidden"
                                                                x-state:on="Active" x-state:off="Not Active"
                                                                :class="{
                                                                    'bg-gray-100 text-gray-900': activeIndex ===
                                                                        0,
                                                                    'text-gray-700': !(activeIndex === 0)
                                                                }"
                                                                role="menuitem" tabindex="-1" id="menu-2-item-0"
                                                                @mouseenter="onMouseEnter($event)"
                                                                @mousemove="onMouseMove($event, 0)"
                                                                @mouseleave="onMouseLeave($event)"
                                                                @click="open = false; focusButton()">Note</a>
                                                            <a href="#"
                                                                class="block px-4 py-2 text-sm text-gray-700 sm:hidden"
                                                                :class="{
                                                                    'bg-gray-100 text-gray-900': activeIndex ===
                                                                        1,
                                                                    'text-gray-700': !(activeIndex === 1)
                                                                }"
                                                                role="menuitem" tabindex="-1" id="menu-2-item-1"
                                                                @mouseenter="onMouseEnter($event)"
                                                                @mousemove="onMouseMove($event, 1)"
                                                                @mouseleave="onMouseLeave($event)"
                                                                @click="open = false; focusButton()">Assign</a>
                                                            <a href="#"
                                                                class="block px-4 py-2 text-sm text-gray-700"
                                                                :class="{
                                                                    'bg-gray-100 text-gray-900': activeIndex ===
                                                                        2,
                                                                    'text-gray-700': !(activeIndex === 2)
                                                                }"
                                                                role="menuitem" tabindex="-1" id="menu-2-item-2"
                                                                @mouseenter="onMouseEnter($event)"
                                                                @mousemove="onMouseMove($event, 2)"
                                                                @mouseleave="onMouseLeave($event)"
                                                                @click="open = false; focusButton()">Archive</a>
                                                            <a href="#"
                                                                class="block px-4 py-2 text-sm text-gray-700"
                                                                :class="{
                                                                    'bg-gray-100 text-gray-900': activeIndex ===
                                                                        3,
                                                                    'text-gray-700': !(activeIndex === 3)
                                                                }"
                                                                role="menuitem" tabindex="-1" id="menu-2-item-3"
                                                                @mouseenter="onMouseEnter($event)"
                                                                @mousemove="onMouseMove($event, 3)"
                                                                @mouseleave="onMouseLeave($event)"
                                                                @click="open = false; focusButton()">Move</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- Right buttons -->
                                        <nav aria-label="Pagination">
                                            <span class="isolate inline-flex rounded-md shadow-sm">
                                                <a href="#"
                                                    class="relative inline-flex items-center rounded-l-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-10 focus:border-blue-600 focus:outline-none focus:ring-1 focus:ring-blue-600">
                                                    <span class="sr-only">Next</span>
                                                    <svg class="h-5 w-5"
                                                        x-description="Heroicon name: mini/chevron-up"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M14.77 12.79a.75.75 0 01-1.06-.02L10 8.832 6.29 12.77a.75.75 0 11-1.08-1.04l4.25-4.5a.75.75 0 011.08 0l4.25 4.5a.75.75 0 01-.02 1.06z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </a>
                                                <a href="#"
                                                    class="relative -ml-px inline-flex items-center rounded-r-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-10 focus:border-blue-600 focus:outline-none focus:ring-1 focus:ring-blue-600">
                                                    <span class="sr-only">Previous</span>
                                                    <svg class="h-5 w-5"
                                                        x-description="Heroicon name: mini/chevron-down"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </a>
                                            </span>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <!-- Message header -->
                        </div>

                        <div class="min-h-0 flex-1 overflow-y-auto">
                            <div class="bg-white pb-6 pt-5 shadow">
                                <div class="px-4 sm:flex sm:items-baseline sm:justify-between sm:px-6 lg:px-8">
                                    <div class="sm:w-0 sm:flex-1">
                                        <h1 id="message-heading" class="text-lg font-medium text-gray-900">Re: New
                                            pricing
                                            for existing customers</h1>
                                        <p class="mt-1 truncate text-sm text-gray-500">callmebymyname@amadeus.net</p>
                                    </div>

                                    <div
                                        class="mt-4 flex items-center justify-between sm:ml-6 sm:mt-0 sm:flex-shrink-0 sm:justify-start">
                                        <span
                                            class="inline-flex items-center rounded-full bg-cyan-100 px-3 py-0.5 text-sm font-medium text-cyan-800">Open</span>
                                        <div x-data="Components.menu({ open: false })" x-init="init()"
                                            @keydown.escape.stop="open = false; focusButton()"
                                            @click.away="onClickAway($event)"
                                            class="relative ml-3 inline-block text-left">
                                            <div>
                                                <button type="button"
                                                    class="-my-2 flex items-center rounded-full bg-white p-2 text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-600"
                                                    id="menu-3-button" x-ref="button" @click="onButtonClick()"
                                                    @keyup.space.prevent="onButtonEnter()"
                                                    @keydown.enter.prevent="onButtonEnter()" aria-expanded="false"
                                                    aria-haspopup="true" x-bind:aria-expanded="open.toString()"
                                                    @keydown.arrow-up.prevent="onArrowUp()"
                                                    @keydown.arrow-down.prevent="onArrowDown()">
                                                    <span class="sr-only">Open options</span>
                                                    <svg class="h-5 w-5"
                                                        x-description="Heroicon name: mini/ellipsis-vertical"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path
                                                            d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </div>


                                            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                                x-transition:enter-start="transform opacity-0 scale-95"
                                                x-transition:enter-end="transform opacity-100 scale-100"
                                                x-transition:leave="transition ease-in duration-75"
                                                x-transition:leave-start="transform opacity-100 scale-100"
                                                x-transition:leave-end="transform opacity-0 scale-95"
                                                class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                                x-ref="menu-items"
                                                x-description="Dropdown menu, show/hide based on menu state."
                                                x-bind:aria-activedescendant="activeDescendant" role="menu"
                                                aria-orientation="vertical" aria-labelledby="menu-3-button"
                                                tabindex="-1" @keydown.arrow-up.prevent="onArrowUp()"
                                                @keydown.arrow-down.prevent="onArrowDown()"
                                                @keydown.tab="open = false"
                                                @keydown.enter.prevent="open = false; focusButton()"
                                                @keyup.space.prevent="open = false; focusButton()">
                                                <div class="py-1" role="none">
                                                    <button type="button"
                                                        class="flex w-full justify-between px-4 py-2 text-sm text-gray-700"
                                                        x-state:on="Active" x-state:off="Not Active"
                                                        :class="{
                                                            'bg-gray-100 text-gray-900': activeIndex === 0,
                                                            'text-gray-700': !
                                                                (activeIndex === 0)
                                                        }"
                                                        role="menuitem" tabindex="-1" id="menu-3-item-0"
                                                        @mouseenter="onMouseEnter($event)"
                                                        @mousemove="onMouseMove($event, 0)"
                                                        @mouseleave="onMouseLeave($event)"
                                                        @click="open = false; focusButton()">
                                                        <span>Copy email address</span>
                                                    </button>
                                                    <a href="#"
                                                        class="flex justify-between px-4 py-2 text-sm text-gray-700"
                                                        :class="{
                                                            'bg-gray-100 text-gray-900': activeIndex === 1,
                                                            'text-gray-700': !
                                                                (activeIndex === 1)
                                                        }"
                                                        role="menuitem" tabindex="-1" id="menu-3-item-1"
                                                        @mouseenter="onMouseEnter($event)"
                                                        @mousemove="onMouseMove($event, 1)"
                                                        @mouseleave="onMouseLeave($event)"
                                                        @click="open = false; focusButton()">
                                                        <span>Previous conversations</span>
                                                    </a>
                                                    <a href="#"
                                                        class="flex justify-between px-4 py-2 text-sm text-gray-700"
                                                        :class="{
                                                            'bg-gray-100 text-gray-900': activeIndex === 2,
                                                            'text-gray-700': !
                                                                (activeIndex === 2)
                                                        }"
                                                        role="menuitem" tabindex="-1" id="menu-3-item-2"
                                                        @mouseenter="onMouseEnter($event)"
                                                        @mousemove="onMouseMove($event, 2)"
                                                        @mouseleave="onMouseLeave($event)"
                                                        @click="open = false; focusButton()">
                                                        <span>View original</span>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Thread section-->
                            <ul role="list" class="space-y-2 py-4 sm:space-y-4 sm:px-6 lg:px-8">

                                <li class="bg-white px-4 py-6 shadow sm:rounded-lg sm:px-6">
                                    <div class="sm:flex sm:items-baseline sm:justify-between">
                                        <h3 class="text-base font-medium">
                                            <span class="text-gray-900">Adam Sinew</span>
                                            <!-- space -->
                                            <span class="text-gray-600">wrote</span>
                                        </h3>
                                        <p class="mt-1 whitespace-nowrap text-sm text-gray-600 sm:ml-3 sm:mt-0">
                                            <time datetime="2021-01-28T19:24">Yesterday at 7:24am</time>
                                        </p>
                                    </div>
                                    <div class="mt-4 space-y-6 text-sm text-gray-800">
                                        <p>Thanks so much! Can't wait to try it out.</p>
                                    </div>
                                </li>

                                <li class="bg-white px-4 py-6 shadow sm:rounded-lg sm:px-6">
                                    <div class="sm:flex sm:items-baseline sm:justify-between">
                                        <h3 class="text-base font-medium">
                                            <span class="text-gray-900">Monica White</span>
                                            <!-- space -->
                                            <span class="text-gray-600">wrote</span>
                                        </h3>
                                        <p class="mt-1 whitespace-nowrap text-sm text-gray-600 sm:ml-3 sm:mt-0">
                                            <time datetime="2021-01-27T16:35">Wednesday at 4:35pm</time>
                                        </p>
                                    </div>
                                    <div class="mt-4 space-y-6 text-sm text-gray-800">
                                        <p>Adam Wathan is an asshole. ipsum dolor sit amet, consectetur adipiscing elit.
                                            Malesuada at ultricies tincidunt elit et, enim. Habitant nunc, adipiscing
                                            non
                                            fermentum, sed est a, aliquet. Lorem in vel libero vel augue aliquet dui
                                            commodo.</p>
                                        <p>Nec malesuada sed sit ut aliquet. Cras ac pharetra, sapien purus vitae
                                            vestibulum
                                            auctor faucibus ullamcorper. Leo quam tincidunt porttitor neque, velit sed.
                                            Tortor mauris ornare ut tellus sed aliquet amet venenatis condimentum.
                                            Convallis
                                            accumsan et nunc eleifend.</p>
                                        <p><strong style="font-weight: 600;">Monica White</strong><br>Customer Service
                                        </p>
                                    </div>
                                </li>

                                <li class="bg-white px-4 py-6 shadow sm:rounded-lg sm:px-6">
                                    <div class="sm:flex sm:items-baseline sm:justify-between">
                                        <h3 class="text-base font-medium">
                                            <span class="text-gray-900">Border Coolie</span>
                                            <!-- space -->
                                            <span class="text-gray-600">wrote</span>
                                        </h3>
                                        <p class="mt-1 whitespace-nowrap text-sm text-gray-600 sm:ml-3 sm:mt-0">
                                            <time datetime="2021-01-27T16:09">Wednesday at 4:09pm</time>
                                        </p>
                                    </div>
                                    <div class="mt-4 space-y-6 text-sm text-gray-800">
                                        <p>Escucha me mucha ipsum dolor sit amet, consectetur adipiscing elit. Malesuada
                                            at
                                            ultricies tincidunt elit et, enim. Habitant nunc, adipiscing non fermentum,
                                            sed
                                            est a, aliquet. Lorem in vel libero vel augue aliquet dui commodo.</p>
                                        <p>Nec malesuada sed sit ut aliquet. Cras ac pharetra, sapien purus vitae
                                            vestibulum
                                            auctor faucibus ullamcorper. Leo quam tincidunt porttitor neque, velit sed.
                                            Tortor mauris ornare ut tellus sed aliquet amet venenatis condimentum.
                                            Convallis
                                            accumsan et nunc eleifend.</p>
                                        <p>– Joe</p>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </section>

                    <!-- Message list-->
                    <aside class="hidden xl:order-first xl:block xl:flex-shrink-0">
                        <div class="relative flex h-full w-96 flex-col border-r border-gray-200 bg-gray-100">
                            <div class="flex-shrink-0">
                                <div class="flex h-16 flex-col justify-center bg-white px-6">
                                    <div class="flex items-baseline space-x-3">
                                        <h2 class="text-lg font-medium text-gray-900">Inbox</h2>
                                        <p class="text-sm font-medium text-gray-500">42 messages</p>
                                    </div>
                                </div>
                                <div
                                    class="border-b border-t border-gray-200 bg-gray-50 px-6 py-2 text-sm font-medium text-gray-500">
                                    Sorted by date</div>
                            </div>
                            <nav aria-label="Message list" class="min-h-0 flex-1 overflow-y-auto">
                                <ul role="list" class="divide-y divide-gray-200 border-b border-gray-200">

                                    <li
                                        class="relative bg-white px-6 py-5 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600 hover:bg-gray-50">
                                        <div class="flex justify-between space-x-3">
                                            <div class="min-w-0 flex-1">
                                                <a href="#" class="block focus:outline-none">
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    <p class="truncate text-sm font-medium text-gray-900">Gloria
                                                        Roberston
                                                    </p>
                                                    <p class="truncate text-sm text-gray-500">Velit placeat sit ducimus
                                                        non
                                                        sed</p>
                                                </a>
                                            </div>
                                            <time datetime="2021-01-27T16:35"
                                                class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">1d
                                                ago</time>
                                        </div>
                                        <div class="mt-1">
                                            <p class="line-clamp-2 text-sm text-gray-600">Doloremque dolorem maiores
                                                assumenda dolorem facilis. Velit vel in a rerum natus facere. Enim rerum
                                                eaque qui facilis. Numquam laudantium sed id dolores omnis in. Eos
                                                reiciendis deserunt maiores et accusamus quod dolor.</p>
                                        </div>
                                    </li>

                                    <li
                                        class="relative bg-white px-6 py-5 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600 hover:bg-gray-50">
                                        <div class="flex justify-between space-x-3">
                                            <div class="min-w-0 flex-1">
                                                <a href="#" class="block focus:outline-none">
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    <p class="truncate text-sm font-medium text-gray-900">Virginia
                                                        Abshire
                                                    </p>
                                                    <p class="truncate text-sm text-gray-500">Nemo mollitia repudiandae
                                                        adipisci explicabo optio consequatur tempora ut nihil</p>
                                                </a>
                                            </div>
                                            <time datetime="2021-01-27T16:35"
                                                class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">1d
                                                ago</time>
                                        </div>
                                        <div class="mt-1">
                                            <p class="line-clamp-2 text-sm text-gray-600">Doloremque dolorem maiores
                                                assumenda dolorem facilis. Velit vel in a rerum natus facere. Enim rerum
                                                eaque qui facilis. Numquam laudantium sed id dolores omnis in. Eos
                                                reiciendis deserunt maiores et accusamus quod dolor.</p>
                                        </div>
                                    </li>

                                    <li
                                        class="relative bg-white px-6 py-5 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600 hover:bg-gray-50">
                                        <div class="flex justify-between space-x-3">
                                            <div class="min-w-0 flex-1">
                                                <a href="#" class="block focus:outline-none">
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    <p class="truncate text-sm font-medium text-gray-900">Kyle
                                                        Gulgowski
                                                    </p>
                                                    <p class="truncate text-sm text-gray-500">Doloremque reprehenderit
                                                        et
                                                        harum quas explicabo nulla architecto dicta voluptatibus</p>
                                                </a>
                                            </div>
                                            <time datetime="2021-01-27T16:35"
                                                class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">1d
                                                ago</time>
                                        </div>
                                        <div class="mt-1">
                                            <p class="line-clamp-2 text-sm text-gray-600">Doloremque dolorem maiores
                                                assumenda dolorem facilis. Velit vel in a rerum natus facere. Enim rerum
                                                eaque qui facilis. Numquam laudantium sed id dolores omnis in. Eos
                                                reiciendis deserunt maiores et accusamus quod dolor.</p>
                                        </div>
                                    </li>

                                    <li
                                        class="relative bg-white px-6 py-5 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600 hover:bg-gray-50">
                                        <div class="flex justify-between space-x-3">
                                            <div class="min-w-0 flex-1">
                                                <a href="#" class="block focus:outline-none">
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    <p class="truncate text-sm font-medium text-gray-900">Hattie Haag
                                                    </p>
                                                    <p class="truncate text-sm text-gray-500">Eos sequi et aut ex
                                                        impedit
                                                    </p>
                                                </a>
                                            </div>
                                            <time datetime="2021-01-27T16:35"
                                                class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">1d
                                                ago</time>
                                        </div>
                                        <div class="mt-1">
                                            <p class="line-clamp-2 text-sm text-gray-600">Doloremque dolorem maiores
                                                assumenda dolorem facilis. Velit vel in a rerum natus facere. Enim rerum
                                                eaque qui facilis. Numquam laudantium sed id dolores omnis in. Eos
                                                reiciendis deserunt maiores et accusamus quod dolor.</p>
                                        </div>
                                    </li>

                                    <li
                                        class="relative bg-white px-6 py-5 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600 hover:bg-gray-50">
                                        <div class="flex justify-between space-x-3">
                                            <div class="min-w-0 flex-1">
                                                <a href="#" class="block focus:outline-none">
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    <p class="truncate text-sm font-medium text-gray-900">Wilma Glover
                                                    </p>
                                                    <p class="truncate text-sm text-gray-500">Quisquam veniam explicabo
                                                    </p>
                                                </a>
                                            </div>
                                            <time datetime="2021-01-27T16:35"
                                                class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">1d
                                                ago</time>
                                        </div>
                                        <div class="mt-1">
                                            <p class="line-clamp-2 text-sm text-gray-600">Doloremque dolorem maiores
                                                assumenda dolorem facilis. Velit vel in a rerum natus facere. Enim rerum
                                                eaque qui facilis. Numquam laudantium sed id dolores omnis in. Eos
                                                reiciendis deserunt maiores et accusamus quod dolor.</p>
                                        </div>
                                    </li>

                                    <li
                                        class="relative bg-white px-6 py-5 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600 hover:bg-gray-50">
                                        <div class="flex justify-between space-x-3">
                                            <div class="min-w-0 flex-1">
                                                <a href="#" class="block focus:outline-none">
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    <p class="truncate text-sm font-medium text-gray-900">Dolores
                                                        Morissette</p>
                                                    <p class="truncate text-sm text-gray-500">Est ratione molestiae
                                                        modi
                                                        maiores consequatur eligendi et excepturi magni</p>
                                                </a>
                                            </div>
                                            <time datetime="2021-01-27T16:35"
                                                class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">1d
                                                ago</time>
                                        </div>
                                        <div class="mt-1">
                                            <p class="line-clamp-2 text-sm text-gray-600">Doloremque dolorem maiores
                                                assumenda dolorem facilis. Velit vel in a rerum natus facere. Enim rerum
                                                eaque qui facilis. Numquam laudantium sed id dolores omnis in. Eos
                                                reiciendis deserunt maiores et accusamus quod dolor.</p>
                                        </div>
                                    </li>

                                    <li
                                        class="relative bg-white px-6 py-5 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600 hover:bg-gray-50">
                                        <div class="flex justify-between space-x-3">
                                            <div class="min-w-0 flex-1">
                                                <a href="#" class="block focus:outline-none">
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    <p class="truncate text-sm font-medium text-gray-900">Guadalupe
                                                        Walsh
                                                    </p>
                                                    <p class="truncate text-sm text-gray-500">Commodi deserunt aut
                                                        veniam
                                                        rem ipsam</p>
                                                </a>
                                            </div>
                                            <time datetime="2021-01-27T16:35"
                                                class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">1d
                                                ago</time>
                                        </div>
                                        <div class="mt-1">
                                            <p class="line-clamp-2 text-sm text-gray-600">Doloremque dolorem maiores
                                                assumenda dolorem facilis. Velit vel in a rerum natus facere. Enim rerum
                                                eaque qui facilis. Numquam laudantium sed id dolores omnis in. Eos
                                                reiciendis deserunt maiores et accusamus quod dolor.</p>
                                        </div>
                                    </li>

                                    <li
                                        class="relative bg-white px-6 py-5 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600 hover:bg-gray-50">
                                        <div class="flex justify-between space-x-3">
                                            <div class="min-w-0 flex-1">
                                                <a href="#" class="block focus:outline-none">
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    <p class="truncate text-sm font-medium text-gray-900">Jasmine
                                                        Hansen
                                                    </p>
                                                    <p class="truncate text-sm text-gray-500">Illo illum aut debitis
                                                        earum
                                                    </p>
                                                </a>
                                            </div>
                                            <time datetime="2021-01-27T16:35"
                                                class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">1d
                                                ago</time>
                                        </div>
                                        <div class="mt-1">
                                            <p class="line-clamp-2 text-sm text-gray-600">Doloremque dolorem maiores
                                                assumenda dolorem facilis. Velit vel in a rerum natus facere. Enim rerum
                                                eaque qui facilis. Numquam laudantium sed id dolores omnis in. Eos
                                                reiciendis deserunt maiores et accusamus quod dolor.</p>
                                        </div>
                                    </li>

                                    <li
                                        class="relative bg-white px-6 py-5 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600 hover:bg-gray-50">
                                        <div class="flex justify-between space-x-3">
                                            <div class="min-w-0 flex-1">
                                                <a href="#" class="block focus:outline-none">
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    <p class="truncate text-sm font-medium text-gray-900">Ian Volkman
                                                    </p>
                                                    <p class="truncate text-sm text-gray-500">Qui dolore iste ut est
                                                        cumque
                                                        sed</p>
                                                </a>
                                            </div>
                                            <time datetime="2021-01-27T16:35"
                                                class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">1d
                                                ago</time>
                                        </div>
                                        <div class="mt-1">
                                            <p class="line-clamp-2 text-sm text-gray-600">Doloremque dolorem maiores
                                                assumenda dolorem facilis. Velit vel in a rerum natus facere. Enim rerum
                                                eaque qui facilis. Numquam laudantium sed id dolores omnis in. Eos
                                                reiciendis deserunt maiores et accusamus quod dolor.</p>
                                        </div>
                                    </li>

                                    <li
                                        class="relative bg-white px-6 py-5 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600 hover:bg-gray-50">
                                        <div class="flex justify-between space-x-3">
                                            <div class="min-w-0 flex-1">
                                                <a href="#" class="block focus:outline-none">
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    <p class="truncate text-sm font-medium text-gray-900">Rafael Klocko
                                                    </p>
                                                    <p class="truncate text-sm text-gray-500">Aut sed aut illum
                                                        delectus
                                                        maiores laboriosam ex</p>
                                                </a>
                                            </div>
                                            <time datetime="2021-01-27T16:35"
                                                class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">1d
                                                ago</time>
                                        </div>
                                        <div class="mt-1">
                                            <p class="line-clamp-2 text-sm text-gray-600">Doloremque dolorem maiores
                                                assumenda dolorem facilis. Velit vel in a rerum natus facere. Enim rerum
                                                eaque qui facilis. Numquam laudantium sed id dolores omnis in. Eos
                                                reiciendis deserunt maiores et accusamus quod dolor.</p>
                                        </div>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                    </aside>
                </main>
            </div>
        </div>

    </div>

</x-layout>

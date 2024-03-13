<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel - Job Board Pro</title>

    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- be careful put them in an array -->
</head>

<body class="mx-auto h-full max-w-5xl">
    <!-- mx-auto mt-10 max-w-2xl bg-gradient-to-r from-blue-500 to-pink-500 -->
    <nav x-data="{ isOpen: false }" class="relative bg-white shadow dark:bg-gray-800">
        <div class="container mx-auto px-6 py-4">
            <div class="lg:flex lg:items-center lg:justify-between">
                <div class="flex items-center justify-between">
                    <a href="{{ route('home') }}">
                        <img class="h-6 w-auto sm:h-7" src="https://merakiui.com/images/full-logo.svg" alt="">
                    </a>

                    <!-- Mobile menu button -->
                    <div class="flex lg:hidden">
                        <button x-cloak @click="isOpen = !isOpen" type="button"
                            class="text-gray-500 hover:text-gray-600 focus:text-gray-600 focus:outline-none dark:text-gray-200 dark:hover:text-gray-400 dark:focus:text-gray-400"
                            aria-label="toggle menu">
                            <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                            </svg>

                            <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']"
                    class="absolute inset-x-0 z-20 w-full bg-white px-6 py-4 transition-all duration-300 ease-in-out dark:bg-gray-800 lg:relative lg:top-0 lg:mt-0 lg:flex lg:w-auto lg:translate-x-0 lg:items-center lg:bg-transparent lg:p-0 lg:opacity-100">
                    <div class="-mx-6 flex flex-col lg:mx-8 lg:flex-row lg:items-center">
                        <a href="{{ route('home') }}"
                            class="mx-3 mt-2 transform rounded-md px-3 py-2 text-gray-700 transition-colors duration-300 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700 lg:mt-0">Home</a>
                        <a href="{{ route('employer-jobs.index') }}"
                            class="mx-3 mt-2 transform rounded-md px-3 py-2 text-gray-700 transition-colors duration-300 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700 lg:mt-0">My
                            Jobs</a>
                        <a href="{{ route('my-application.index') }}"
                            class="mx-3 mt-2 transform rounded-md px-3 py-2 text-gray-700 transition-colors duration-300 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700 lg:mt-0">My
                            Applications</a>
                    </div>

                    <div class="mt-4 flex items-center lg:mt-0">
                        @auth
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="flex items-center focus:outline-none"
                                    aria-label="toggle profile dropdown" type="submit">
                                    <div class="h-8 w-8 overflow-hidden rounded-full border-2 border-gray-400">
                                        <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80"
                                            class="h-full w-full object-cover" alt="avatar">
                                    </div>

                                    <h3 class="mx-2 hidden text-gray-700 dark:text-gray-200 lg:flex">
                                        {{ auth()->user()->name }}</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                        class="h-4 w-4">
                                        <path fill-rule="evenodd"
                                            d="M2 4.75A2.75 2.75 0 0 1 4.75 2h3a2.75 2.75 0 0 1 2.75 2.75v.5a.75.75 0 0 1-1.5 0v-.5c0-.69-.56-1.25-1.25-1.25h-3c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h3c.69 0 1.25-.56 1.25-1.25v-.5a.75.75 0 0 1 1.5 0v.5A2.75 2.75 0 0 1 7.75 14h-3A2.75 2.75 0 0 1 2 11.25v-6.5Zm9.47.47a.75.75 0 0 1 1.06 0l2.25 2.25a.75.75 0 0 1 0 1.06l-2.25 2.25a.75.75 0 1 1-1.06-1.06l.97-.97H5.25a.75.75 0 0 1 0-1.5h7.19l-.97-.97a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd" />
                                    </svg>

                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}"
                                class="flex items-center text-green-700 focus:outline-none dark:text-green-200"
                                aria-label="login button">
                                Login
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="flex w-full flex-col">
        {{ $slot }}
    </div>
    <div class="absolute bottom-0 right-3" x-data="{ isOpen: {{ session()->has('fail') || session()->has('success') ? 'true' : 'false' }} }" x-show="isOpen">
        <div id="toast-success"
            class="mb-4 flex w-full max-w-xs items-center rounded-lg bg-white p-4 text-gray-500 shadow dark:bg-gray-800 dark:text-gray-400"
            role="alert">
            @if (session()->has('fail'))
                <div
                    class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-red-100 text-red-500 dark:bg-red-800 dark:text-red-200">
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">{{ session('fail') }}</div>
            @endif

            @if (session()->has('success'))
                <div
                    class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-green-100 text-green-500 dark:bg-green-800 dark:text-green-200">
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">{{ session('success') }}</div>
            @endif
            <button type="button"
                class="-mx-1.5 -my-1.5 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white"
                data-dismiss-target="#toast-success" aria-label="Close" @click="isOpen=false">
                <span class="sr-only">Close</span>
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    </div>
</body>

</html>

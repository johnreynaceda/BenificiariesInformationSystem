<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @wireUiScripts
    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased">
    <x-dialog z-index="z-50" blur="md" align="center" />
    <div>
        <div class="w-full mx-auto bg-white border-b 2xl:max-w-7xl">
            <div x-data="{ open: false }"
                class="relative flex flex-col w-full p-5 mx-auto bg-white md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                <div class="flex flex-row items-center justify-between lg:justify-start">
                    <a class="text-lg tracking-tight flex space-x-4 items-center text-black uppercase focus:outline-none focus:ring lg:text-2xl"
                        href="/">
                        <img src="{{ asset('images/logo.png') }}" class="h-16" alt="">
                        <span class="text-2xl font-bold text-gray-700 uppecase focus:ring-0">
                            MSWD-BIS
                        </span>
                    </a>
                    <button @click="open = !open"
                        class="inline-flex items-center justify-center p-2 text-gray-400 hover:text-black focus:outline-none focus:text-black md:hidden">
                        <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16">
                            </path>
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <nav :class="{ 'flex': open, 'hidden': !open }"
                    class="flex-col items-center flex-grow hidden md:pb-0 md:flex md:justify-end md:flex-row">
                    <a class="px-2 py-2  text-gray-500 lg:px-6 md:px-3 hover:text-blue-600 lg:ml-auto" href="#">
                        Home
                    </a>
                    <a class="px-2 py-2  text-gray-500 lg:px-6 md:px-3 hover:text-blue-600" href="#">
                        about
                    </a>


                    <div class="inline-flex items-center gap-2 list-none lg:ml-auto">

                        <div class="relative group" @click.away="open = false" x-data="{ open: false }">
                            <div :class="{ 'bg-white': open }"
                                class="flex group-hover:bg-white p-1 rounded-xl space-x-1.5 items-center cursor-pointer"
                                @click="open = !open">
                                <img src="{{ asset('images/logo.png') }}" class="h-12 w-12 rounded-full" alt="">
                                <div>
                                    <h1 class="font-medium text-gray-700">{{ auth()->user()->name }}!</h1>
                                    <h1 class="text-xs leading-3">{{ auth()->user()->email }}</h1>
                                </div>
                                <span
                                    class="fill-main transition-transform duration-200 transform group-hover:text-accent rotate-0"
                                    :class="{ 'rotate-180': open, 'rotate-0': !open }">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-7 w-7">
                                        <path d="M12 14L8 10H16L12 14Z"></path>
                                    </svg>
                                </span>
                            </div>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1" style="display: none;">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                                    tabindex="-1" id="user-menu-item-0">
                                    Your Profile
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 fill-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-red-100 hover:scale-95 hover:text-red-500 hover:fill-red-500"
                                        href="#"
                                        onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4">
                                            <path
                                                d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C15.2713 2 18.1757 3.57078 20.0002 5.99923L17.2909 5.99931C15.8807 4.75499 14.0285 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C14.029 20 15.8816 19.2446 17.2919 17.9998L20.0009 17.9998C18.1765 20.4288 15.2717 22 12 22ZM19 16V13H11V11H19V8L24 12L19 16Z">
                                            </path>
                                        </svg>
                                        <span class="ml-4">
                                            Logout
                                        </span>
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <section class="my-10">
            <main>
                {{ $slot }}
            </main>
        </section>
    </div>
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>

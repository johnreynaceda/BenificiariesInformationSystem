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
    <div class="flex h-screen overflow-hidden bg-gray-100">
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64">
                <div class="flex flex-col flex-grow pt-5 overflow-y-auto bg-[#7C96AB] border-r">
                    <div class="flex flex-col flex-shrink-0 px-4">
                        <a class="text-lg flex items-center space-x-2 justify-center font-semibold tracking-tighter text-black focus:outline-none focus:ring "
                            href="/">
                            <img src="{{ asset('images/msdw_logo.jpg') }}" class="h-10" alt="">
                            <span class="text-xl text-gray-700 font-bold">
                                MSWD - BIS
                            </span>
                        </a>
                        <button class="hidden rounded-lg focus:outline-none focus:shadow-outline">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-col flex-grow px-4 mt-10">
                        <nav class="flex-1 space-y-1 ">

                            <ul>
                                <li>
                                    <a wire:navigate
                                        class="{{ request()->routeIs('admin.dashboard') ? 'bg-white text-[#7C96AB] fill-[#7C96AB] ' : ' text-white fill-white' }} inline-flex items-center w-full px-4 py-2.5 mt-1 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:text-[#7C96AB] hover:fill-[#7C96AB] hover:scale-95 "
                                        href="{{ route('admin.dashboard') }}">

                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2ZM12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4ZM12 5C13.018 5 13.9852 5.21731 14.8579 5.60806L13.2954 7.16944C12.8822 7.05892 12.448 7 12 7C9.23858 7 7 9.23858 7 12C7 13.3807 7.55964 14.6307 8.46447 15.5355L7.05025 16.9497L6.89445 16.7889C5.71957 15.5368 5 13.8525 5 12C5 8.13401 8.13401 5 12 5ZM18.3924 9.14312C18.7829 10.0155 19 10.9824 19 12C19 13.933 18.2165 15.683 16.9497 16.9497L15.5355 15.5355C16.4404 14.6307 17 13.3807 17 12C17 11.552 16.9411 11.1178 16.8306 10.7046L18.3924 9.14312ZM16.2426 6.34315L17.6569 7.75736L13.9325 11.483C13.9765 11.6479 14 11.8212 14 12C14 13.1046 13.1046 14 12 14C10.8954 14 10 13.1046 10 12C10 10.8954 10.8954 10 12 10C12.1788 10 12.3521 10.0235 12.517 10.0675L16.2426 6.34315Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3">
                                            Dashboard
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a wire:navigate
                                        class="{{ request()->routeIs('admin.application') ? 'bg-white text-[#7C96AB] fill-[#7C96AB] ' : 'text-white fill-white' }} inline-flex items-center w-full px-4 py-2.5 mt-1  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:text-[#7C96AB] hover:fill-[#7C96AB] hover:scale-95 "
                                        href="{{ route('admin.application') }}">

                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM19 9H14V4H5V20H19V9ZM8 7H11V9H8V7ZM8 11H16V13H8V11ZM8 15H16V17H8V15Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3">
                                            Application
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a wire:navigate
                                        class="{{ request()->routeIs('admin.barangay') ? 'bg-white text-[#7C96AB] fill-[#7C96AB] ' : 'text-white fill-white' }} inline-flex items-center w-full px-4 py-2.5 mt-1  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:text-[#7C96AB] hover:fill-[#7C96AB] hover:scale-95 "
                                        href="{{ route('admin.announcement') }}">

                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M9 17C9 17 16 18 19 21H20C20.5523 21 21 20.5523 21 20V13.937C21.8626 13.715 22.5 12.9319 22.5 12C22.5 11.0681 21.8626 10.285 21 10.063V4C21 3.44772 20.5523 3 20 3H19C16 6 9 7 9 7H5C3.89543 7 3 7.89543 3 9V15C3 16.1046 3.89543 17 5 17H6L7 22H9V17ZM11 8.6612C11.6833 8.5146 12.5275 8.31193 13.4393 8.04373C15.1175 7.55014 17.25 6.77262 19 5.57458V18.4254C17.25 17.2274 15.1175 16.4499 13.4393 15.9563C12.5275 15.6881 11.6833 15.4854 11 15.3388V8.6612ZM5 9H9V15H5V9Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3">
                                            Announcement
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a wire:navigate
                                        class=" {{ request()->routeIs('admin.barangay') ? 'bg-white text-[#7C96AB] fill-[#7C96AB] ' : 'text-white fill-white' }} inline-flex items-center w-full px-4 py-2.5 mt-1  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:text-[#7C96AB] hover:fill-[#7C96AB] hover:scale-95 "
                                        href="{{ route('admin.barangay') }}">

                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M2 5L9 2L15 5L21.303 2.2987C21.5569 2.18992 21.8508 2.30749 21.9596 2.56131C21.9862 2.62355 22 2.69056 22 2.75827V19L15 22L9 19L2.69696 21.7013C2.44314 21.8101 2.14921 21.6925 2.04043 21.4387C2.01375 21.3765 2 21.3094 2 21.2417V5ZM16 19.3955L20 17.6812V5.03308L16 6.74736V19.3955ZM14 19.2639V6.73607L10 4.73607V17.2639L14 19.2639ZM8 17.2526V4.60451L4 6.31879V18.9669L8 17.2526Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3">
                                            Barangay
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a wire:navigate
                                        class=" {{ request()->routeIs('admin.beneficiary-type') ? 'bg-white text-[#7C96AB] fill-[#7C96AB] ' : 'text-white fill-white' }} inline-flex items-center w-full px-4 py-2.5 mt-1  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:text-[#7C96AB] hover:fill-[#7C96AB] hover:scale-95 "
                                        href="{{ route('admin.beneficiary-type') }}">

                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M8 4H21V6H8V4ZM3 3.5H6V6.5H3V3.5ZM3 10.5H6V13.5H3V10.5ZM3 17.5H6V20.5H3V17.5ZM8 11H21V13H8V11ZM8 18H21V20H8V18Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3">
                                            Beneficiary Type
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a wire:navigate
                                        class="{{ request()->routeIs('admin.approve') ? 'bg-white text-[#7C96AB] fill-[#7C96AB] ' : 'text-white fill-white' }} inline-flex items-center w-full px-4 py-2.5 mt-1  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:text-[#7C96AB] hover:fill-[#7C96AB] hover:scale-95 "
                                        href="{{ route('admin.approve') }}">

                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M8.00008 6V9H5.00008V6H8.00008ZM3.00008 4V11H10.0001V4H3.00008ZM13.0001 4H21.0001V6H13.0001V4ZM13.0001 11H21.0001V13H13.0001V11ZM13.0001 18H21.0001V20H13.0001V18ZM10.7072 16.2071L9.29297 14.7929L6.00008 18.0858L4.20718 16.2929L2.79297 17.7071L6.00008 20.9142L10.7072 16.2071Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3">
                                            Approved List
                                        </span>
                                    </a>
                                </li>
                                {{-- <li>
                                    <a wire:navigate
                                        class="inline-flex items-center w-full px-4 py-2.5 mt-1 text-white fill-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:text-[#7C96AB] hover:fill-[#7C96AB] hover:scale-95 "
                                        href="#">

                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M20 5C20.5523 5 21 5.44772 21 6V12C21 12.5523 20.5523 13 20 13C20.628 13.8355 21 14.8743 21 16C21 18.7614 18.7614 21 16 21C13.2386 21 11 18.7614 11 16C11 14.8743 11.372 13.8355 11.9998 12.9998L4 13C3.44772 13 3 12.5523 3 12V6C3 5.44772 3.44772 5 4 5H20ZM13 15V17H19V15H13ZM19 7H5V11H19V7Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3">
                                            Deleted List
                                        </span>
                                    </a>
                                </li> --}}
                                <li>
                                    <a wire:navigate
                                        class=" {{ request()->routeIs('admin.account') ? 'bg-white text-[#7C96AB] fill-[#7C96AB] ' : 'text-white fill-white' }}  inline-flex items-center w-full px-4 py-2.5 mt-1  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:text-[#7C96AB] hover:fill-[#7C96AB] hover:scale-95 "
                                        href="{{ route('admin.account') }}">

                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M3 4.99509C3 3.89323 3.89262 3 4.99509 3H19.0049C20.1068 3 21 3.89262 21 4.99509V19.0049C21 20.1068 20.1074 21 19.0049 21H4.99509C3.89323 21 3 20.1074 3 19.0049V4.99509ZM5 5V19H19V5H5ZM7.97216 18.1808C7.35347 17.9129 6.76719 17.5843 6.22083 17.2024C7.46773 15.2753 9.63602 14 12.1022 14C14.5015 14 16.6189 15.2071 17.8801 17.0472C17.3438 17.4436 16.7664 17.7877 16.1555 18.0718C15.2472 16.8166 13.77 16 12.1022 16C10.3865 16 8.87271 16.8641 7.97216 18.1808ZM12 13C10.067 13 8.5 11.433 8.5 9.5C8.5 7.567 10.067 6 12 6C13.933 6 15.5 7.567 15.5 9.5C15.5 11.433 13.933 13 12 13ZM12 11C12.8284 11 13.5 10.3284 13.5 9.5C13.5 8.67157 12.8284 8 12 8C11.1716 8 10.5 8.67157 10.5 9.5C10.5 10.3284 11.1716 11 12 11Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3">
                                            Accounts
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    {{-- <div class="flex flex-shrink-0 p-4 px-4 bg-gray-50">
                        <div @click.away="open = false" class="relative inline-flex items-center w-full"
                            x-data="{ open: false }">
                            <button @click="open = !open"
                                class="inline-flex items-center justify-between w-full px-4 py-3 text-lg font-medium text-center text-white transition duration-500 ease-in-out transform rounded-xl hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <span>
                                    <span class="flex-shrink-0 block group">
                                        <div class="flex items-center">
                                            <div>
                                                <img class="inline-block object-cover rounded-full h-9 w-9"
                                                    src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=2070&amp;q=80"
                                                    alt="">
                                            </div>
                                            <div class="ml-3 text-left">
                                                <p class="text-sm font-medium text-gray-500 group-hover:text-blue-500">
                                                    Mike Vega
                                                </p>
                                                <p class="text-xs font-medium text-gray-500 group-hover:text-blue-500">
                                                    Pro user
                                                </p>
                                            </div>
                                        </div>
                                    </span>
                                </span>
                                <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="inline w-5 h-5 ml-4 text-black transition-transform duration-200 transform rotate-0"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute bottom-0 z-50 w-full mx-auto mt-2 origin-bottom-right bg-white rounded-xl"
                                style="display: none">
                                <div class="px-2 py-2 bg-white rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                                    <ul>
                                        <li>
                                            <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-blue-500"
                                                href="#">
                                                <ion-icon class="w-4 h-4 md hydrated" name="body-outline" role="img"
                                                    aria-label="body outline"></ion-icon>
                                                <span class="ml-4">
                                                    Account
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-blue-500"
                                                href="#">
                                                <ion-icon class="w-4 h-4 md hydrated" name="person-circle-outline"
                                                    role="img" aria-label="person circle outline"></ion-icon>
                                                <span class="ml-4">
                                                    Profile
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="flex flex-col flex-1 w-0 overflow-hidden">
            <main class="relative flex-1 overflow-y-auto focus:outline-none">
                <div class="py-4 border-b bg-white">
                    <div class="px-10 flex justify-between items-center">
                        <div>
                            <h1 class="text-2xl text-main font-semibold">MUNICIPALITY OF MAGALANG</h1>
                        </div>
                        <div class="flex space-x-4 items-center">

                            <div class="relative group" @click.away="open = false" x-data="{ open: false }">
                                <div :class="{ 'bg-white': open }"
                                    class="flex group-hover:bg-white p-1 rounded-xl space-x-1.5 items-center cursor-pointer"
                                    @click="open = !open">
                                    <img src="{{ asset('images/logo.png') }}" class="h-12 w-12 rounded-full"
                                        alt="">
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
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                class="h-4 w-4">
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
                    </div>
                </div>
                <div class="p-10">
                    <h1 class="uppercase text-gray-700 font-bold text-xl">@yield('title')</h1>
                    <div class="mt-6">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </div>

    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>

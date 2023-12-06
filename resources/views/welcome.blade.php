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

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased">

    <div class="w-full mx-auto  ">
        <div class="mx-20 bg-white border-b">
            <div x-data="{ open: false }"
                class="relative flex flex-col w-full p-5 mx-auto bg-white md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                <div class="flex flex-row items-center justify-between lg:justify-start">
                    <a class="text-lg tracking-tight flex space-x-4 items-center text-black uppercase focus:outline-none focus:ring lg:text-2xl"
                        href="/">
                        <img src="{{ asset('images/logo.png') }}" class="h-16" alt="">
                        <span class="text-2xl font-bold text-gray-700 uppecase focus:ring-0">
                            MUNICIPALITY OF MAGALANG
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
                    class="flex-col flex-grow hidden py-10 md:flex lg:py-0 md:justify-end md:flex-row">
                    <ul class="space-y-2 list-none md:space-y-0 md:items-center md:inline-flex">
                        <li>
                            <a href="#" class="px-2 font-medium  text-gray-500  md:px-3 hover:text-blue-600">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#" class="px-2 font-medium  text-gray-500  md:px-3 hover:text-blue-600">
                                Contact
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}"
                                class="px-2 font-medium  text-gray-500  md:px-3 hover:text-blue-600">
                                Login
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <section class="relative">
            <img src="{{ asset('images/bg1.png') }}"
                class="absolute  opacity-80 top-0 bottom-0 w-full h-full object-cover " alt="">
            <div class="items-center px-8 py-12 mx-auto bg-opacity-80 bg-gray-700 lg:px-16 md:px-12 lg:py-24 relative">
                <div class="justify-center  w-full text-center lg:p-10 max-auto">
                    <div class="justify-center items-center flex flex-col w-full mx-auto">
                        <img src="{{ asset('images/msdw_logo.jpg') }}" class="h-40 w-40 rounded-lg shadow"
                            alt="">
                        <p class="mt-5 text-5xl font-bold tracking-tighter text-white">
                            WELCOME TO MSWD
                        </p>
                        <p class="max-w-xl mx-auto mt-4  tracking-tight text-gray-100">
                            Formulate plans, measures and to ensure the delivery of programs and services which include
                            programs and services on Child and Youth Welfare, Family and Community Welfare, Street
                            Children, Juvenile Delinquents, Victims of Drug Abuse, Livelihood and Other Projects,
                            Nutrition Services and Pre-Marriage Counselling.
                        </p>
                    </div>

                </div>

            </div>
        </section>

        <section class="mt-20">
            <h1 class="text-3xl font-bold text-gray-700 text-center">OUR ASSISTANCE TO INDIVIDUAL IN CRISIS SITUATION
            </h1>
            <div class="mx-auto max-w-7xl mt-10 grid grid-cols-3 gap-5">
                <div class="border rounded-t-xl cursor-pointer hover:scale-95 ">
                    <div class="rounded-t-xl overflow-hidden relative">
                        <div class="bg-gray-600">
                            <img src="{{ asset('images/bg1.png') }}"
                                class="h-56 object-cover opacity-10 w-full relative" alt="">
                        </div>
                        <div class="flex absolute bottom-5 right-0 mt-3 justify-end">
                            <span class="bg-green-600 px-4 rounded-l-xl text-xl text-white py-3">
                                Medical Assistance
                            </span>
                        </div>
                    </div>

                    <div class="my-5 px-3">
                        <p class="text-justify">
                            DSWD Government Medical Cash Assistance is given to those who are in need, Medical cash
                            assistance is a type of financial assistance which helps cover Medical care cost.
                        </p>
                    </div>
                </div>
                <div class="border rounded-t-xl cursor-pointer hover:scale-95 ">
                    <div class="rounded-t-xl overflow-hidden relative">
                        <div class="bg-gray-600">
                            <img src="{{ asset('images/bg1.png') }}"
                                class="h-56 object-cover opacity-10 w-full relative" alt="">
                        </div>
                        <div class="flex absolute bottom-5 right-0 mt-3 justify-end">
                            <span class="bg-green-600 px-4 rounded-l-xl text-xl text-white py-3">
                                Educational Assistance
                            </span>
                        </div>
                    </div>

                    <div class="my-5 px-3">
                        <p class="text-justify">
                            The Government agency in the philippines provices various Educational assistance programs to
                            support the education of qualified students and low-Income Families, Main aim is to provide
                            Educational assistance to Children, Youth and adults to access educational Opportunities to
                            improve chances of escaping the poverty.
                        </p>
                    </div>
                </div>
                <div class="border rounded-t-xl cursor-pointer hover:scale-95 ">
                    <div class="rounded-t-xl overflow-hidden relative">
                        <div class="bg-gray-600">
                            <img src="{{ asset('images/bg1.png') }}"
                                class="h-56 object-cover opacity-10 w-full relative" alt="">
                        </div>
                        <div class="flex absolute bottom-5 right-0 mt-3 justify-end">
                            <span class="bg-green-600 px-4 rounded-l-xl text-xl text-white py-3">
                                Food Assistance
                            </span>
                        </div>
                    </div>

                    <div class="my-5 px-3">
                        <p class="text-justify">
                            The assistance to the clients in need would be provided up to a maximum of ten (10) days or
                            an amount of at least P80.00 per meal per individual.lt includes hot meals, food/meal
                            allowance, or cash equivalent to the cost of the required hot meals and/or Food packs.

                        </p>
                    </div>
                </div>
                <div class="border rounded-t-xl cursor-pointer hover:scale-95 ">
                    <div class="rounded-t-xl overflow-hidden relative">
                        <div class="bg-gray-600">
                            <img src="{{ asset('images/bg1.png') }}"
                                class="h-56 object-cover opacity-10 w-full relative" alt="">
                        </div>
                        <div class="flex absolute bottom-5 right-0 mt-3 justify-end">
                            <span class="bg-green-600 px-4 rounded-l-xl text-xl text-white py-3">
                                Funeral Assistance
                            </span>
                        </div>
                    </div>

                    <div class="my-5 px-3">
                        <p class="text-justify">
                            the assistance to defray funeral and related expenses, including but not limited to expenses
                            in bringing the remains to the residence of the deceased and/or burial site inaccordance
                            with existing customary practices of the family,especially among Indigenous peoples and
                            Moros
                        </p>
                    </div>
                </div>
                <div class="border rounded-t-xl cursor-pointer hover:scale-95 ">
                    <div class="rounded-t-xl overflow-hidden relative">
                        <div class="bg-gray-600">
                            <img src="{{ asset('images/bg1.png') }}"
                                class="h-56 object-cover opacity-10 w-full relative" alt="">
                        </div>
                        <div class="flex absolute bottom-5 right-0 mt-3 justify-end">
                            <span class="bg-green-600 px-4 rounded-l-xl text-xl text-white py-3">
                                Transportation Assistance
                            </span>
                        </div>
                    </div>

                    <div class="my-5 px-3">
                        <p class="text-justify">
                            Transportation assistance encompasses programs that provide access to public transit,
                            rideshare options, and specialized services, addressing mobility challenges for individuals
                            without personal vehicles. These initiatives play a crucial role in enhancing accessibility
                            to essential services and improving overall quality of life.
                        </p>
                    </div>
                </div>


            </div>
        </section>



    </div>



    <footer class="w-full bg-gray-100 border-t mt-20" aria-labelledby="footer-heading">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-16">
            <div class="flex flex-col items-baseline space-y-6">
                <div class="mx-auto">
                    <a href="/"
                        class="mx-auto text-lg text-center text-black transition duration-500 ease-in-out transform tracking-relaxed">
                        <svg class="w-5 h-5" viewBox="0 0 232 232" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M166.524 51.4683L116.367 101.625L65.5235 51.4683L116.367 0.62434L166.524 51.4683ZM231.11 116.054L180.953 166.898L130.796 116.054L180.953 65.8969L231.11 116.054ZM101.939 116.054L51.0948 166.898L0.250934 116.054L51.0948 65.8969L101.939 116.054ZM166.524 181.326L116.367 231.483L65.5235 181.326L116.367 130.482L166.524 181.326Z"
                                fill="#0c0c0c"></path>
                        </svg> </a>
                </div>
                <div class="mx-auto">
                    <span class="mx-auto mt-2 text-sm text-gray-500">
                        Copyright © 2023
                        <a href="https://unwrapped.design" class="mx-2 text-blue-500 hover:text-gray-500"
                            rel="noopener noreferrer">@BeneficiariesInformationSystem</a>.Since 2023
                    </span>
                </div>
            </div>
        </div>
    </footer>
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
sd

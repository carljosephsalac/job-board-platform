<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full">
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            {{-- <img class="w-8 h-8" src="{{ asset('img/cjstechlogo.png') }}" alt="Your Company"> --}}
                            <img class="w-8 h-8" src="{{ Vite::asset('resources/images/cjstechlogo.png') }}"
                                alt="Your Company">
                        </div>
                        <div class="hidden md:block">
                            <div class="flex items-baseline ml-10 space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <x-nav-link href="/home" :active="request()->is('home')">Home</x-nav-link>
                                <x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
                                <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                                <x-nav-link type="button">Button</x-nav-link>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="flex items-center ml-4 md:ml-6">
                            @guest
                                <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                                    Login
                                </x-nav-link>
                                <x-nav-link href="{{ route('register.create') }}" :active="request()->routeIs('register.create')">
                                    Register
                                </x-nav-link>
                            @endguest
                            @auth
                                <x-button data-modal-target="logout-modal" data-modal-toggle="logout-modal" type="button">
                                    Logout
                                </x-button>
                                <x-modal id="logout-modal">
                                    Are you sure you want to logout?
                                    <x-slot:buttons>
                                        <form action="{{ route('logout.destroy') }}" method="POST"
                                            onsubmit="disableSubmitButton(this)">
                                            @csrf
                                            <x-button data-modal-hide="logout-modal" type="submit" color="red">
                                                Yes, I'm sure
                                            </x-button>
                                        </form>
                                        <x-button data-modal-hide="logout-modal" type="button">
                                            No, cancel
                                        </x-button>
                                    </x-slot:buttons>
                                </x-modal>
                            @endauth
                        </div>
                    </div>
                    <div class="flex -mr-2 md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button"
                            class="relative inline-flex items-center justify-center p-2 text-gray-400 bg-gray-800 rounded-md hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg class="block w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg class="hidden w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="md:hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="/" class="block px-3 py-2 text-base font-medium text-white bg-gray-900 rounded-md"
                        aria-current="page">
                        Home
                    </a>
                    <a href="/jobs"
                        class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
                        Jobs
                    </a>
                    <a href="/contact"
                        class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
                        Contact
                    </a>
                </div>
                <div class="pt-4 pb-3 border-t border-gray-700">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            {{-- <img class="w-10 h-10 rounded-full" src="{{ asset('img/graduation-pic-reduce-crop.jpg') }}"
                                alt=""> --}}
                            <img class="w-10 h-10 rounded-full"
                                src="{{ Vite::asset('resources/images/graduation-pic-reduce-crop.jpg') }}"
                                alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium leading-none text-white">Carl Joseph Salac</div>
                            <div class="text-sm font-medium leading-none text-gray-400">carl@example.com</div>
                        </div>
                        <button type="button"
                            class="relative flex-shrink-0 p-1 ml-auto text-gray-400 bg-gray-800 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                            </svg>
                        </button>
                    </div>
                    <div class="px-2 mt-3 space-y-1">
                        <a href="#"
                            class="block px-3 py-2 text-base font-medium text-gray-400 rounded-md hover:bg-gray-700 hover:text-white">Your
                            Profile</a>
                        <a href="#"
                            class="block px-3 py-2 text-base font-medium text-gray-400 rounded-md hover:bg-gray-700 hover:text-white">Settings</a>
                        <a href="#"
                            class="block px-3 py-2 text-base font-medium text-gray-400 rounded-md hover:bg-gray-700 hover:text-white">Sign
                            out</a>
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow">
            <div class="flex justify-between px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
                @auth
                    <x-button href="/jobs/create" color="green">Create Job</x-button>
                @endauth
            </div>
        </header>
        <main>
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>

    <script>
        function disableSubmitButton(form) {
            form.querySelector('[type="submit"]').disabled = true;
        }
    </script>
    {{-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script> --}}
</body>

</html>

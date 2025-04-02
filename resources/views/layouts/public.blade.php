<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Charity Project</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-[#eeeff1] text/50 dark:bg-black dark:text-white/50">
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="top-0 left-0 w-full bg-[#725304] py-6 shadow-md text-white z-50">
                    <div class="container mx-auto flex items-center justify-between px-6">
                        <div class="flex items-center">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-6 lg:h-8 w-auto">
                        </div>
                        @if (Route::has('login'))
                            <nav class="flex w-full justify-end lg:col-span-2 space-x-4 sticky top-0">
                                <a href="{{ url('/') }}"
                                    class="inline-block rounded-md text-sm px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white hover:text-gray-800 dark:hover:text-gray-300 dark:focus-visible:ring-white">Home</a>
                                <a href="{{ url('/about') }}"
                                    class="inline-block rounded-md text-sm px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white hover:text-gray-800 dark:hover:text-gray-300 dark:focus-visible:ring-white">About
                                    Us</a>
                                <a href="{{ url('/contact') }}"
                                    class="inline-block rounded-md text-sm px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white hover:text-gray-800 dark:hover:text-gray-300 dark:focus-visible:ring-white">Contact
                                    Us</a>
                                <a href="{{ url('/project') }}"
                                    class="inline-block rounded-md text-sm px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white hover:text-gray-800 dark:hover:text-gray-300 dark:focus-visible:ring-white">Projects</a>
                                @auth
                                    <a href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2  text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}"
                                        class="inline-block bg-blue-400 text-black font-semibold px-6 py-3 text-sm rounded-lg shadow-md hover:bg-yellow-500">
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                            class="inline-block bg-green-500 text-black font-semibold px-6 py-3 text-sm rounded-lg shadow-md hover:bg-yellow-500">
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </div>
                </header>
                <main class="mt-6">
                    @yield('content')
                </main>

                <x-footer />
            </div>
        </div>
    </div>
</body>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="min-h-screen flex flex-col">
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('user.dashboard') }}"
                            class="text-xl font-bold text-gray-800 hover:text-indigo-600">My App</a>
                        <a href="{{ route('user.projects') }}"
                            class="text-md  text-gray-800 hover:text-indigo-600">Projects</a>
                        <a href="{{ route('user.denatedProjects') }}"
                            class="text-md  text-gray-800 hover:text-indigo-600">Donated</a>

                    </div>
                    <div class="flex items-center space-x-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="text-sm font-medium bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <main class="flex-grow py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>
        <footer class="bg-white shadow py-4">
            <div class="text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} My App. All rights reserved.
            </div>
        </footer>
    </div>
    @livewireScripts
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-white flex items-center justify-center min-h-screen">
    <div class="bg-white text-black p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center text-black">Register</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-600 text-white rounded border-l-4 border-red-800">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-black mb-2 font-medium">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-black mb-2 font-medium">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-black mb-2 font-medium">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500">
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-black mb-2 font-medium">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500">
            </div>

            <button type="submit"
                class="w-full bg-yellow-500 text-black py-2 px-4 rounded-md font-semibold hover:bg-yellow-600 transition duration-200">
                Register
            </button>
        </form>

        <div class="mt-4 text-center">
            <p>Already have an account?<span class="p-2"><a href="{{ route('login') }}"
                        class="text-yellow-500 hover:underline">Login</a></span></p>
        </div>
    </div>
</body>

</html>

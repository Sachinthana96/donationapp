<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#000000] text-white flex items-center justify-center min-h-screen">
    <div class="bg-gray-200 text-black p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center text-black">Login</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-600 text-white rounded border-l-4 border-red-800">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-black mb-2 font-medium">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-black mb-2 font-medium">Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    <button type="button" onclick="togglePassword()"
                        class="absolute inset-y-0 right-3 flex items-center text-gray-600">
                        <svg fill="#000000" class="w-5 h-5" version="1.1" id="Capa_1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 487.55 487.55" xml:space="preserve">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <g id="XMLID_1992_">
                                        <path id="XMLID_2003_"
                                            d="M244.625,171.415c-40,0-72.4,32.4-72.4,72.4s32.4,72.4,72.4,72.4s72.4-32.4,72.4-72.4 C316.925,203.815,284.525,171.415,244.625,171.415z M244.625,220.215c-13,0-23.6,10.6-23.6,23.6c0,6-4.8,10.8-10.8,10.8 s-10.8-4.8-10.8-10.8c0-24.9,20.3-45.2,45.2-45.2c6,0,10.8,4.8,10.8,10.8C255.425,215.415,250.525,220.215,244.625,220.215z">
                                        </path>
                                        <path id="XMLID_2012_"
                                            d="M481.325,227.515c-224.8-258.6-428-53.9-476.4,2.8c-6.5,7.6-6.6,18.8-0.1,26.4 c221.9,259,423.4,64.6,476.5,3.7C489.625,251.015,489.625,237.015,481.325,227.515z M244.625,346.615 c-56.8,0-102.8-46-102.8-102.8s46-102.8,102.8-102.8s102.8,46,102.8,102.8S301.325,346.615,244.625,346.615z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </button>
                </div>
            </div>

            <script>
                function togglePassword() {
                    let passwordInput = document.getElementById("password");
                    passwordInput.type = passwordInput.type === "password" ? "text" : "password";
                }
            </script>


            <button type="submit"
                class="w-full bg-yellow-500 text-black py-2 px-4 rounded-md font-semibold hover:bg-yellow-600 transition duration-200">
                Login
            </button>
        </form>

        <div class="mt-4 text-center">
            <p>Don't have an account?<span class="p-2"><a href="{{ route('register') }}"
                        class="text-yellow-500 hover:underline">Register</a></span></p>
        </div>
    </div>
</body>

</html>

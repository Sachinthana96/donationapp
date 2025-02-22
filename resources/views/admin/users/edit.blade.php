@extends('layouts.admin')

@section('content')
<div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Edit User") }}
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center items-start bg-gray-100">
    <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-lg">
    
    <form action="#" method="POST" class="space-y-4">
            <!-- Name  -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                <input type="text" id="name" name="name" 
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:border-blue-500" 
                    value="Sachinthana Perera">
            </div>

            <!-- Email  -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" id="email" name="email" 
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:border-blue-500" 
                    value="sachinthanaperera.info">
            </div>

            <!-- Role Dropdown -->
            <div>
                <label for="role" class="block text-sm font-medium text-gray-600">Role</label>
                <select id="role" name="role"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:border-blue-500">
                    <option selected>User</option>
                    <option>Admin</option>
                    <option>Co-Ordinator</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center mt-4">
                <button type="submit"
                    class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition duration-300">
                    Update
                </button>
            </div>
        </form>
</div>
</div>

@endsection




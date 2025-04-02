@extends('layouts.admin')

@section('content')
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('User Management') }}
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <table class="w-full bg-white shadow-md rounded-lg overflow-hidden border border-gray-300 mx-auto">
            <thead class="bg-gray-200 text-gray-800 text-sm tracking-wide">
                <tr>
                    <th class="px-6 py-3 text-left border-gray-300">ID</th>
                    <th class="px-6 py-3 text-left border-gray-300">Name</th>
                    <th class="px-6 py-3 text-left border-gray-300">Email</th>
                    <th class="px-6 py-3 text-left border-gray-300">Role</th>
                    <th class="px-6 py-3 text-center border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($users as $user)
                    <tr class="border-b hover:bg-gray-100 transition">
                        <td class="px-6 py-4">{{ $user->id }}</td>
                        <td class="px-6 py-4 font-medium">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            <span
                                class="px-3 py-1 rounded-full text-white text-xs font-semibold
                        {{ $user->role === 'Admin' ? 'bg-blue-500' : 'bg-gray-500' }}">
                                {{ $user->role }}
                            </span>
                        </td>
                        <td class="px-6 py-4 flex justify-center gap-2">
                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold px-4 py-2 rounded-lg shadow-md transition">
                                Edit
                            </a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')"
                                    class="bg-red-500 hover:bg-red-600 text-white text-sm font-semibold px-4 py-2 rounded-lg shadow-md transition">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

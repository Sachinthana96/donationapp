@extends('layouts.admin')

@section('content')
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 font-semibold text-xl">
                    {{ __('Projects Management') }}
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session('success'))
            <div
                class="mb-4 p-4 rounded-lg bg-green-100 border border-green-300 text-green-800 text-sm flex items-center gap-2 shadow-sm">
                <svg class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="mb-4 p-4 rounded-lg bg-red-100 border border-red-300 text-red-800 text-sm shadow-sm">
                <p class="font-semibold mb-2 flex items-center gap-2">
                    <svg class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Please fix the following errors:
                </p>
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="flex justify-end mb-4">
            <a href="{{ route('admin.projects.create') }}"
                class="bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded-lg shadow-md transition">
                + Create Project
            </a>
        </div>
        <table class="w-full bg-white shadow-md rounded-lg overflow-hidden border border-gray-300 mx-auto">
            <thead class="bg-gray-200 text-gray-800 text-sm tracking-wide">
                <tr>
                    <th class="px-6 py-3 text-left border-gray-300">ID</th>
                    <th class="px-6 py-3 text-left border-gray-300">Project Name</th>
                    <th class="px-6 py-3 text-left border-gray-300">Description</th>
                    <th class="px-6 py-3 text-left border-gray-300">Start Date</th>
                    <th class="px-6 py-3 text-center border-gray-300">End Date</th>
                    <th class="px-6 py-3 text-center border-gray-300">Items</th>
                    <th class="px-6 py-3 text-center border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($projects as $project)
                    <tr class="border-b hover:bg-gray-100 transition">
                        <td class="px-6 py-4">{{ $project->id }}</td>
                        <td class="px-6 py-4 font-medium">{{ $project->pname }}</td>
                        <td class="px-6 py-4">{{ $project->description }}</td>
                        <td class="px-6 py-4">{{ $project->start_date }}</td>
                        <td class="px-6 py-4">{{ $project->end_date }}</td>
                        <td class="px-6 py-4">{{ $project->item_required }}</td>

                        <td class="px-6 py-4 flex justify-center gap-2">
                            <a href="{{ route('admin.projects.edit', $project->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold px-4 py-2 rounded-lg shadow-md transition">
                                Edit
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
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

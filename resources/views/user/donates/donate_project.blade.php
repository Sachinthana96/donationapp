@extends('layouts.user')

@section('title', 'Donated Projects')

@section('content')
    <div class="p-6">
        <h1 class="text-3xl font-bold mb-6">Donated Projects</h1>

        @if ($donatedProject->isEmpty())
            <div
                class="text-gray-600 dark:text-gray-300 text-xl flex justify-center p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
                No donated projects found.
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($donatedProject as $project)
                    <div
                        class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $project->pname }}
                            </h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            {{ $project->description }}
                        </p>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                            {{ \Carbon\Carbon::parse($project->start_date)->format('M d, Y') }} -
                            {{ \Carbon\Carbon::parse($project->end_date)->format('M d, Y') }}
                        </p>
                        <a href="{{ route('selected.projects', ['id' => $project->id]) }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-white rounded-lg bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800 transition duration-300">
                            Donate
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

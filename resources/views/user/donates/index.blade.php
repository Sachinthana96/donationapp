@extends('layouts.user')

@section('title', 'Item Log')

@section('content')

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="p-6 text-gray-900 dark:text-gray-100 text-3xl  font-bold">
                {{ __('Donate Project') }}
            </div>

        </div>
    </div>
    @if (session()->has('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
            {{ session('error') }}
        </div>
    @endif
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white p-4 rounded-lg shadow mb-6 flex justify-between items-center">
            <div>
                <h3 class="text-xl font-bold mb-1">{{ $project->pname }}</h3>
                <p class="text-gray-600 font-bold">{{ $project->description }}</p>
                <p class="text-gray-600">{{ $project->start_date }} - {{ $project->end_date }}</p>
            </div>

            <div class="text-right">
                <p class="text-lg font-semibold text-green-600"> Total Donated:
                    Rs.{{ number_format($totalDonated ?? 0, 2) }}
                </p>
            </div>
        </div>


        <div class="grid grid-cols-6 gap-4 border-b px-4 py-2 text-sm font-semibold text-gray-700">
            <div>Item Name</div>
            <div>Quntity</div>
            <div>Avalibale Quntity</div>
            <div>Unit Price</div>
        </div>
        @foreach ($project->items as $item)
            <div class="bg-white rounded-lg shadow
            @if ($item->available_quantity == 0) bg-red-100 @endif">
                <div class="grid grid-cols-6 gap-4 px-4 py-3 border-b items-center text-sm mt-2">
                    <div>{{ $item->name }}</div>
                    <div class="flex items-center space-x-1">
                        <span>{{ (int) $item->quantity }}</span>
                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"></path>
                        </svg>
                    </div>

                    <div class="flex items-center space-x-1">
                        <span>{{ (int) $item->available_quantity }}</span>
                        <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>

                    <div>{{ $item->unit_price }}</div>
                    <div></div>

                    @if ($item->available_quantity > 0)
                        <div class="flex space-x-2">
                            @livewire('user.donation.recived-item', ['itemId' => $item->id, 'projectId' => $project->id, 'userId' => auth()->user()->id])
                            @livewire('user.donation.donate-item', ['itemId' => $item->id, 'projectId' => $project->id, 'userId' => auth()->user()->id])
                        </div>
                    @else
                        <div class="flex space-x-2 opacity-50 cursor-not-allowed">
                            <button disabled class="bg-gray-300 text-gray-600 px-3 py-1 rounded text-xs">
                                Already Recived
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach

    </div>
@endsection

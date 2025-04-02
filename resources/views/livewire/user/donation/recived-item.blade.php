<div>
    <button wire:click="openModal" class="bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 rounded text-xs">
        Recived
    </button>

    @if ($isOpenModal)
        <div class="fixed inset-0 z-50 overflow-y-hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-start justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                <div x-cloak wire:click="closeModal" x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>

                <div x-cloak x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                    <div class="flex items-center justify-between space-x-4">
                        <h1 class="text-xl font-medium text-gray-800 ">Recive Item</h1>
                        <button wire:click="closeModal" class="text-gray-600 focus:outline-none hover:text-gray-700">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>

                    <p class="mt-2 text-sm text-gray-500 ">
                        Choose the how do you recive the items.
                    </p>

                    <form class="mt-5 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-900 dark:text-white">Item Name:</label>
                            <p class="text-gray-700 dark:text-gray-300">{{ $item->name }}</p>
                        </div>

                        <div class="mb-4">
                            <label
                                class="block text-sm font-medium text-gray-900 dark:text-white">{{ ucfirst($item->type) }}
                                Quantity:</label>
                            <p class="text-gray-700 dark:text-gray-300">{{ $item->quantity }}</p>
                        </div>

                        <div class="mb-4">
                            <label
                                class="block text-sm font-medium text-gray-900 dark:text-white">{{ ucfirst($item->type) }}
                                Available Quantity:</label>
                            <p class="text-gray-700 dark:text-gray-300">{{ $item->available_quantity }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-900 dark:text-white">Unit Price:</label>
                            <p class="text-gray-700 dark:text-gray-300">Rs. {{ $item->unit_price }}</p>
                        </div>

                        <div class="mb-6">
                            <label for="receive-count"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Receive
                                Count</label>
                            <input type="number" id="receive-count" name="receive_count" wire:model="receiveCount"
                                value="{{ old('receiveCount') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('receiveCount')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="button" wire:click="save"
                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:focus:ring-yellow-900">
                                Receive
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>

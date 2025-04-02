@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.projects') }}"
                    class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition">
                    &lt; Back
                </a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
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

                <form id="project-form" action="{{ route('admin.projects.store', $project->id ?? null) }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="pname" class="block text-sm font-medium text-gray-700">Project Name</label>
                        <input type="text" name="pname" id="pname"
                            value="{{ old('pname', $project->pname ?? '') }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="3"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $project->description ?? '') }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                            <input type="date" name="start_date" id="start_date"
                                value="{{ old('start_date', $project->start_date ?? '') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                            <input type="date" name="end_date" id="end_date"
                                value="{{ old('end_date', $project->end_date ?? '') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                    </div>

                    <input type="hidden" name="items_json" id="items_json">

                    <div>
                        <h3 class="text-lg font-semibold mb-2">Project Items</h3>

                        <div id="item-container" class="space-y-6">
                        </div>

                        <button type="button" id="add-item"
                            class="mt-2 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                            + Add Item
                        </button>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                            {{ isset($project) ? 'Update' : 'Save' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('project-form');
            const itemContainer = document.getElementById('item-container');
            const addItemBtn = document.getElementById('add-item');
            const itemTypes = ['kg', 'liter', 'piece'];
            const preloadItems = @json($project->items ?? []);
            console.log(preloadItems);

            const createItemRow = (item = {}) => {
                const name = item.name ? String(item.name).replace(/"/g, '&quot;') : '';
                const unit_price = item.unit_price ?? '';
                const quantity = item.quantity ? parseInt(item.quantity) : '';
                const type = item.type ?? '';

                const row = document.createElement('div');
                row.classList.add('item-row', 'grid', 'grid-cols-1', 'sm:grid-cols-4', 'gap-4', 'items-center');

                row.innerHTML = `
                <input type="text" placeholder="Item name" value="${name}" class="item-name border-gray-300 rounded-md shadow-sm px-2 py-1" required>
                <input type="number" step="0.01" placeholder="Unit price" value="${unit_price}" class="item-unit-price border-gray-300 rounded-md shadow-sm px-2 py-1" required>
                <input type="number" placeholder="Quantity" value="${quantity}" class="item-quantity border-gray-300 rounded-md shadow-sm px-2 py-1" required>
                <select class="item-type border-gray-300 rounded-md shadow-sm px-2 py-1">
                    ${itemTypes.map(typeOption => `
                                <option value="${typeOption}" ${typeOption === type ? 'selected' : ''}>${typeOption}</option>
                            `).join('')}
                </select>
            `;

                itemContainer.appendChild(row);
            };
            if (preloadItems.length > 0) {
                preloadItems.forEach(item => createItemRow(item));
            } else {
                createItemRow();
            }
            addItemBtn.addEventListener('click', createItemRow);

            form.addEventListener('submit', function(e) {
                const items = [];
                itemContainer.querySelectorAll('.item-row').forEach(row => {
                    const name = row.querySelector('.item-name').value;
                    const unit_price = row.querySelector('.item-unit-price').value;
                    const quantity = row.querySelector('.item-quantity').value;
                    const type = row.querySelector('.item-type').value;

                    items.push({
                        name,
                        unit_price,
                        quantity,
                        type
                    });
                });

                document.getElementById('items_json').value = JSON.stringify(items);
            });
        });
    </script>




@endsection

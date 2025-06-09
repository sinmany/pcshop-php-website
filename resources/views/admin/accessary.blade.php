@extends('layout')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg mt-14">

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="flex items-center justify-between p-4 bg-blue-200 rounded shadow">
                <div>
                    <p class="text-sm text-gray-600">Total Computers</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $totalComputers }}</p>
                </div>
                <i class="fa-solid fa-computer text-blue-600 text-3xl"></i>
            </div>
            <div class="flex items-center justify-between p-4 bg-yellow-200 rounded shadow">
                <div>
                    <p class="text-sm text-gray-600">Total Accessories</p>
                    <p class="text-2xl font-bold text-gray-900">{{ count($accessary) }}</p>
                </div>
                <i class="fa-solid fa-microchip text-yellow-600 text-3xl"></i>
            </div>
            <div class="flex items-center justify-between p-4 bg-green-200 rounded shadow">
                <div>
                    <p class="text-sm text-gray-600">Total Repair Services</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $totalServices }}</p>
                </div>
                <i class="fa-solid fa-cogs text-green-600 text-3xl"></i>
            </div>
        </div>

        <!-- Insert Button + Search -->
        <div class="flex flex-col md:flex-row md:justify-between items-center mb-4">
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                class="mb-2 md:mb-0 text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                Insert Accessory
            </button>
            <form method="GET" action="{{ url('/search') }}" class="w-full md:w-auto">
                <div class="flex">
                    <input type="text" name="search" placeholder="Search..." class="rounded-l-lg p-2 border border-gray-300 w-full md:w-64" />
                    <button type="submit" class="bg-blue-600 text-white px-4 rounded-r-lg hover:bg-blue-700">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
                @if($accessary->isEmpty())
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500">No accessories found.</td>
                </tr>
                @endif
            </form>
        </div>

        <!-- Modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true"
            class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg shadow w-full max-w-xl p-6">
                <div class="flex justify-between items-center border-b pb-3 mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Insert New Accessory</h3>
                    <button type="button" class="text-gray-500 hover:text-red-600" data-modal-toggle="crud-modal">
                        <i class="fa-solid fa-xmark text-xl"></i>
                    </button>
                </div>

                <form method="POST" action="{{ route('accessary.store') }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="w-full mt-1 p-2 border rounded-lg" required>
                        </div>
                        <div class="col-span-2">
                            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                            <input type="number" name="price" id="price" class="w-full mt-1 p-2 border rounded-lg" required>
                        </div>
                        <div class="col-span-2">
                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                            <select name="category" id="category" required
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="" disabled selected>Select Category</option>
                                <option value="Mouse">Mouse</option>
                                <option value="Keyboard">Keyboard</option>
                                <option value="Power Adapter">Power Adapter</option>
                                <option value="Speakers">Speakers</option>
                                <option value="USB">USB</option>
                                <option value="MousePad">MousePad</option>
                                <option value="Other">Other</option>
                            </select>

                        </div>

                        <div class="col-span-2">
                            <label for="image" class="block text-sm font-medium text-gray-700">Image URL</label>
                            <input type="url" name="image" id="image" class="w-full mt-1 p-2 border rounded-lg" required>
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="3" class="w-full mt-1 p-2 border rounded-lg" required></textarea>
                        </div>
                    </div>
                    <button type="submit" class="mt-5 w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Submit</button>
                </form>
            </div>
        </div>

        <!-- Accessories Table -->
        <div class="overflow-x-auto mt-8 bg-white rounded-lg shadow">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="text-xs uppercase bg-blue-100 text-blue-900">
                    <tr>
                        <th class="px-6 py-3 text-left">Image</th>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Price</th>
                        <th class="px-6 py-3 text-left">Edit</th>
                        <th class="px-6 py-3 text-left">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($accessary as $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-3">
                            <img src="{{ $item->image }}" alt="{{ $item->name }}" class="w-20 h-20 object-cover rounded">
                        </td>
                        <td class="px-6 py-3 font-medium text-gray-900">{{ $item->name }}</td>
                        <td class="px-6 py-3 font-semibold">${{ number_format($item->price, 2) }}</td>
                        <td class="px-6 py-3">
                            <a href="{{ route('accessary.edit', $item->id) }}">
                                <button class="text-white bg-blue-500 hover:bg-blue-600 px-3 py-1 rounded-md">
                                    Edit
                                </button>
                            </a>
                        </td>
                        <td class="px-6 py-3">
                            <!-- Delete button triggers modal -->
                            <button
                                class="text-white bg-red-500 hover:bg-red-600 px-3 py-1 rounded-md delete-btn"
                                data-id="{{ $item->id }}"
                                data-name="{{ $item->name }}">
                                Delete
                            </button>
                        </td>
                    </tr>
                    @endforeach

                    <!-- Delete Confirmation Modal -->
                    <div id="delete-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                        <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full">
                            <h2 class="text-lg font-semibold mb-4 text-gray-800">Confirm Delete</h2>
                            <p class="mb-6 text-gray-600" id="delete-message">Are you sure you want to delete this accessory?</p>

                            <div class="flex justify-end space-x-4">
                                <button id="cancel-delete" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
                                <form id="delete-form" method="POST" action="">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const deleteButtons = document.querySelectorAll('.delete-btn');
                            const modal = document.getElementById('delete-modal');
                            const deleteForm = document.getElementById('delete-form');
                            const cancelBtn = document.getElementById('cancel-delete');
                            const deleteMessage = document.getElementById('delete-message');

                            deleteButtons.forEach(button => {
                                button.addEventListener('click', () => {
                                    const itemId = button.getAttribute('data-id');
                                    const itemName = button.getAttribute('data-name');

                                    // Update the form action URL dynamically
                                    deleteForm.action = `/dashboard-admin/accessary/${itemId}`; // adjust this if your route prefix differs

                                    // Update the message with the accessory name
                                    deleteMessage.textContent = `Are you sure you want to delete the accessory "${itemName}"?`;

                                    // Show the modal
                                    modal.classList.remove('hidden');
                                });
                            });

                            cancelBtn.addEventListener('click', () => {
                                modal.classList.add('hidden');
                            });

                            modal.addEventListener('click', (e) => {
                                if (e.target === modal) {
                                    modal.classList.add('hidden');
                                }
                            });
                        });
                    </script>

                    <!-- No accessories found message -->
                    @if($accessary->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">No accessories found.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
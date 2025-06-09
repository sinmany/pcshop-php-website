@extends('layout')

@section('content')
<div class="flex items-center justify-center min-h-screen mt-4 pt-3">
    <div class="max-w-2xl w-full mx-auto bg-gray-200 rounded-md p-12 px-20">
        <form method="POST" action="{{ route('accessary.update', $accessary->id) }}">
            @csrf
            @method("PATCH")
            <div class="">
                <h4 class="flex justify-center mb-4 text-blue-800">Edit Accessary Information</h4>
                <div class="mb-3">
                    <label class="block text-gray-900 mb-2 ms-2 font-medium">Name</label>
                    <input type="text" name="name"
                        value="{{ old('name', $accessary->name) }}"
                        class="form-control w-full px-3 py-2 border rounded">
                </div>
                <div class="mb-3">
                    <label class="block text-gray-900 mb-2 ms-2 font-medium">Price</label>
                    <input type="text" name="price"
                        value="{{ old('price', $accessary->price) }}"
                        class="form-control w-full px-3 py-2 border rounded">
                </div>
                <div class="mb-3">
                    <label class="block text-gray-900 mb-2 ms-2 font-medium">Category</label>
                    <select name="category"
                        class="w-full px-3 py-2 border rounded text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @php
                        $categories = ['Mouse', 'Keyboard', 'Power Adapter', 'Speakers', 'Other'];
                        @endphp

                        @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ old('category', $accessary->category) == $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="description" class="block text-sm font-medium text-gray-900  mb-2 ms-2">Description</label>
                    <input type="text" id="description" name="description"
                        value="{{ old('description', $accessary->description) }}"
                        class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-3">
                    <label for="image" class="block text-sm font-medium text-gray-900  mb-2 ms-2">Image</label>
                    <input type="text" id="image" name="image"
                        value="{{ old('image', $accessary->image) }}"
                        class="block w-full p-4 text-gray-900 border border-blue-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mt-4 pt-2">
                    <button type="submit" class="btn btn-primary w-full py-2">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('css')
<style>
    .form-area {
        padding: 20px;
        margin-top: 20px;
        background-color: #b3e5fc;
    }

    .bi-trash-fill {
        color: red;
        font-size: 18px;
    }

    .bi-pencil {
        color: green;
        font-size: 18px;
        margin-left: 20px;
    }
</style>
@endpush
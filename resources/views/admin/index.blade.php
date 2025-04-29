@extends('layout')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg mt-14">
        <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="flex items-center justify-center h-auto rounded bg-purple-200">
                <i class="fa-solid fa-computer fa-2xl text-blue-600 me-8"></i>
                <p class="text-2xl text-gray-900 font-bold mb-0">
                    @php
                    $count = 0;
                    @endphp
                    @foreach($computer as $key => $computers)
                    @php
                    $count++;
                    @endphp
                    @endforeach
                    Total : {{ $count }}
                </p>
            </div>
            <div class="flex items-center justify-center h-24 rounded bg-pink-200 ">
                <p class="text-2xl text-gray-900 font-bold">
                    Accessary
                </p>
            </div>
            <div class="flex items-center justify-center h-24 rounded bg-green-200 font-bold">
                <p class="text-2xl text-gray-900 ">
                    Service
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <!-- Modal toggle -->
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mt-5" type="button">
                    <p class="mb-0 pb-0.5">
                        Insert Computer
                    </p>
                </button>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-end">
                <form method="GET" action="{{ url('/comsearch') }}" class="d-flex">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search...">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>

            <!-- Main modal -->
            <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-lg max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-3 md:p-5 border-b rounded-t bg-blue-800">
                            <h3 class="text-lg font-semibold text-white text-center mb-0">
                                Insert New Computer
                            </h3>
                            <button type="button" class="text-white bg-transparent hover:text-red-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="crud-modal">
                                <i class="fa-solid fa-xmark"></i>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form class="p-4 md:p-5" method="POST" action="{{ route('computer.store') }}">
                            @csrf
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="id" class="block mb-2 text-sm font-medium text-gray-900">ID</label>
                                    <input type="text" name="id" id="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Product id" required="">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                                    <input type="text" name="price" id="price" class="bg-blue-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Product price" required="">
                                </div>
                                <div class="col-span-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type product name" required="">
                                </div>
                                <div class="col-span-2">
                                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Image</label>
                                    <input type="text" name="image" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600" placeholder="Type product image" required="">
                                </div>
                                <div class="col-span-2">
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                                    <input type="text" name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600" placeholder="Type product description" required="">
                                </div>
                            </div>
                            <div class="col-md-12 mt-4 pt-2 mb-2">
                                <button type="submit" class="btn btn-primary w-full py-2">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <div class="mt-3">
            <div class="relative sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                    <thead class="text-xs text-blue-900 uppercase" style="font-size: 16px;">
                        <tr>
                            <th scope="col" class="px-16 py-3">
                                <span class="col">Image</span>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Computer name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Edit
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $computer as $computer )
                        <tr class="bg-white border-b hover:bg-gray-50 w-100">
                            <td class="p-4">
                                <img src="{{ $computer->image }}" class="w-16 md:w-32 max-w-full max-h-full rounded-md" alt="Computer Image">
                            </td>
                            <td class="px-6 py-4 font-bold text-gray-900 ">
                                {{ $computer->name }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 ">
                                ${{ $computer->price }}
                            </td>
                            <td class="px-6 py-4 ">
                                <a href="{{ route('computer.edit', $computer->id)}}">
                                    <button class="btn btn-primary btn-sm">Edit</button>
                                </a>
                            </td>
                            <td class="px-6 py-4 ">
                                <form method="POST" action="{{ route('computer.destroy', $computer->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


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

    }
</style>
@endpush
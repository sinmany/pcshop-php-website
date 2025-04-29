@extends('layouts.app')

@section('content')
<div class="mb-24 mt-5">
    <div class="container">
        <h3 class="font-bold text-blue-700 ">Product Details</h3>
        <hr class="mb-20">
        <div class="row items-center">
            <div class="mt-3 col col-md-6 ">
                <div class="pe-5 me-5">
                    <h2 class="mb-4 text-gray-700">{{ $computer->name }}</h2>
                    <p class="font-semibold text-gray-600 mb-4">{{ $computer->description }}</p>
                    <h3 class="mb-4 pb-1 font-bold">${{ $computer->price }}</h3>

                    {{-- 🛠️ Start Real Form --}}
                    <form action="{{ route('buy-now') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="{{ $computer->name }}">
                        <input type="hidden" name="description" value="{{ $computer->description }}">
                        <input type="hidden" name="price" value="{{ $computer->price }}">
                        <input type="hidden" name="image" value="{{ $computer->image }}">

                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg text-sm px-4 py-2.5 me-2 font-bold" style="letter-spacing: 1.5px;">
                            Buy Now
                        </button>
                    </form>
                    {{-- 🛠️ End Real Form --}}

                </div>
            </div>
            <div class="col col-md-6">
                <img src="{{ $computer->image }}" alt="Computer Image" style="max-width: 100%; height: auto;" class="rounded-md">
            </div>
        </div>
    </div>
</div>
@endsection
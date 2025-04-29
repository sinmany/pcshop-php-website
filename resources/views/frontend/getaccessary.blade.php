@extends('layouts.app')

@section('content')
<style>
    .product-card {
        max-width: 300px;
        height: 400px;
    }

    .product-image {
        width: 100%;
        height: 210px;
    }

    .product-description {
        max-height: 120px;
        /* Adjust height as needed */
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        /* Number of lines to show */
        -webkit-box-orient: vertical;
    }
</style>

<div class="container mt-12 pt-1 mb-24">
    <h3 class="font-bold text-blue-700 ">Listing our Products</h3>
    <hr class="mb-3">
    <div class="row">
        @foreach($accessary->chunk(4) as $chunk)
        @foreach($chunk as $accessary)

        <div class="col col-sm-12 col-md-4 col-lg-3 flex justify-center mt-4 pt-1">
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow product-card">
                <img class="pb-8 rounded-t-lg product-image" src="{{$accessary->image}}" alt="product image" />
                <div class="px-4">
                    <h5 class="text-xl font-bold tracking-tight text-gray-700 truncate pb-2">{{$accessary->name}}</h5>
                    <p class="product-description text-gray-500">{{$accessary->description}}</p>
                    <div class="flex items-center justify-between mt-4 ">
                        <span class="text-1xl font-semibold text-gray-900">${{$accessary->price}}</span>
                        <a href="{{url('accessarydetails', $accessary->id)}}" class="text-white bg-blue-500 hover:bg-blue-950 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-2.5 py-1.5 no-underline font-normal">View</a>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
        @endforeach
    </div>
</div>
@endsection
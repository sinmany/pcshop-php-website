@extends('layouts.app')

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show mt-3 mx-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

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

                    <!-- Button to open modal -->
                    <button type="button"
                        class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#buyModal">
                        Buy Now
                    </button>
                </div>
            </div>
            <div class="col col-md-6">
                <img src="{{ $computer->image }}" alt="Computer Image" style="max-width: 100%; height: auto;" class="rounded-md">
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="buyModal" tabindex="-1" aria-labelledby="buyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('buy-now') }}">
            @csrf
            <input type="hidden" name="name" value="{{ $computer->name }}">
            <input type="hidden" name="description" value="{{ $computer->description }}">
            <input type="hidden" name="price" value="{{ $computer->price }}">
            <input type="hidden" name="image" value="{{ $computer->image }}">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="buyModalLabel">Please fill your information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="customer_name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="customer_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Send Order</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
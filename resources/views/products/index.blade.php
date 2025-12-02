@extends('Components.layout')

@section('content')
<div class="container mx-auto py-10">

    <!-- Search Bar -->
    <form method="GET" action="{{ route('products.index') }}" class="mb-6">
        <input 
            type="text" 
            name="search" 
            value="{{ $search }}" 
            placeholder="Search products..." 
            class="border border-gray-300 px-4 py-2 rounded w-1/2"
        >
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Search</button>
    </form>

    <!-- Product Results -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse ($products as $product)
            <div class="border p-4 rounded shadow bg-white">
                
                <!-- Product Image -->
                @if($product->image)
                    <img src="{{ asset('images/' . $product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="w-full h-48 object-cover rounded">
                @else
                    <div class="w-full h-48 bg-gray-300 flex items-center justify-center rounded">
                        <span>No Image</span>
                    </div>
                @endif

                <!-- Product Details -->
                <h2 class="text-xl font-bold mt-3">{{ $product->name }}</h2>
                <p class="text-gray-600">{{ $product->category }}</p>
                <p class="text-lg font-semibold mt-1">£{{ $product->price }}</p>
            </div>
        @empty
            <p class="text-gray-600 text-lg">No products found.</p>
        @endforelse
    </div>

</div>
@endsection

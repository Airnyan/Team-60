@extends('Components.layout')

@section('body-class', 'products-page')


@section('content')
<div class="container mx-auto py-10 text-white">

    <!-- PAGE TITLE -->
    <h1 class="text-3xl font-bold mb-6 text-green-400">Our Products</h1>

    <!-- SEARCH BAR -->
    <form method="GET" action="{{ route('products') }}" class="mb-8 flex gap-3">
        <input 
            type="text" 
            name="search" 
            value="{{ $search ?? '' }}"
            placeholder="Search products..."
            class="px-4 py-2 rounded bg-black border border-green-500 
                   text-green-300 w-1/3 placeholder-green-400"
        >
        <button class="bg-green-500 hover:bg-green-600 text-black font-bold px-6 py-2 rounded">
            Search
        </button>
    </form>

    <!-- PRODUCT GRID -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

        @forelse ($products as $product)
            <div class="bg-black border border-green-500 rounded-lg p-4 
                        hover:shadow-lg hover:shadow-green-500/40 transition duration-150">

                <!-- IMAGE -->
                <img 
                    src="{{ asset('images/' . $product->image) }}" 
                    alt="{{ $product->name }}" 
                    class="w-full h-56 object-cover rounded mb-4"
                >

                <!-- NAME -->
                <h2 class="text-green-400 text-xl font-bold mb-2">
                    {{ $product->name }}
                </h2>

                <!-- CATEGORY -->
                <p class="text-gray-300 mb-1">
                    Category: 
                    <span class="text-white font-medium">{{ $product->category }}</span>
                </p>

                <!-- PRICE -->
                <p class="text-green-300 font-bold text-lg mb-4">
                    £{{ $product->price }}
                </p>

                <!-- ADD BUTTON -->
                <button class="bg-green-500 hover:bg-green-600 text-black font-bold w-full py-2 rounded">
                    Add to Basket
                </button>
            </div>
        @empty

            <!-- NO RESULTS TEXT -->
            <p class="text-gray-400 text-lg">
                No products found matching your search.
            </p>

        @endforelse

    </div>

</div>
@endsection

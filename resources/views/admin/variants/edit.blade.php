<x-layout>
<div class="container mx-auto py-10 text-white">

    <h1 class="text-3xl font-bold mb-6 text-green-400">Edit Variant</h1>

    <form method="POST" action="{{ route('admin.variants.update', $variant) }}" enctype="multipart/form-data" class="max-w-md bg-gray-900 p-6 rounded">
        @csrf
        @method('PUT')

        {{-- SIZE --}}
        <div>
            <label class="block text-sm mb-1 text-gray-300">Size</label>
            <input type="text" name="size" value="{{ old('size', $variant   ->size) }}" required class="w-full bg-gray-800 border border-gray-700 rounded px-3 py-2 text-white focus:outline-none focus:border-green-500">
        </div>

        {{-- PRICE --}}                 
        <div>
            <label class="block text-sm mb-1 text-gray-300">Price (£)</label>
            <input type="number" name="price" step="0.01" value="{{ old('price', $variant->price) }}" required class="w-full bg-gray-800 border border-gray-700 rounded px-3 py-2 text-white focus:outline-none focus:border-green-500">
        </div>  

        {{-- DISCOUNTED PRICE --}}          
        <div>
            <label class="block text-sm mb-1 text-gray-300">Discounted Price (£)</label>
            <input type="number" name="discounted_price" step="0.01" value="{{ old('discounted_price', $variant->discounted_price) }}" class="w-full bg-gray-800 border border-gray-700 rounded px-3 py-2 text-white focus:outline-none focus:border-green-500">
        </div>
        
        {{-- STOCK --}}
        <div>
            <label class="block text-sm mb-1 text-gray-300">Stock</label>
            <input type="number" name="stock" value="{{ old('stock', $variant->stock) }}" required class="w-full bg-gray-800 border border-gray-700 rounded px-3 py-2 text-white focus:outline-none focus:border-green-500">

        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
            Update Variant
        </button>
    </form>

</x-layout>
<x-layout>

<div class="max-w-xl mx-auto">

    <h1 class="text-2xl text-green-400 font-bold mb-6">
        Add Variant
    </h1>

    <p class="text-gray-400 mb-6">
        Product: <span class="text-white">{{ $product->product_name }}</span>
    </p>

    <form method="POST"
          action="{{ route('admin.variants.store', $product) }}"
          class="bg-black border border-green-500 rounded-lg p-6 space-y-4">

        @csrf

        {{-- SIZE --}}
        <div>
            <label class="block text-sm mb-1 text-gray-300">Size</label>
            <input type="text"
                   name="size"
                   placeholder="e.g. S, M, L"
                   required
                   class="w-full bg-gray-900 border border-gray-700 rounded px-3 py-2 text-white focus:outline-none focus:border-green-500">
        </div>

        {{-- PRICE --}}
        <div>
            <label class="block text-sm mb-1 text-gray-300">Price (£)</label>
            <input type="number"
                   name="price"
                   step="0.01"
                   placeholder="e.g. 25.00"
                   required
                   class="w-full bg-gray-900 border border-gray-700 rounded px-3 py-2 text-white focus:outline-none focus:border-green-500">
        </div>

        {{-- STOCK --}}
        <div>
            <label class="block text-sm mb-1 text-gray-300">Stock</label>
            <input type="number"
                   name="stock"
                   placeholder="e.g. 10"
                   required
                   class="w-full bg-gray-900 border border-gray-700 rounded px-3 py-2 text-white focus:outline-none focus:border-green-500">
        </div>

        {{-- BUTTONS --}}
        <div class="flex justify-between items-center pt-4">

            <a href="{{ route('admin.products') }}"
               class="text-gray-400 hover:underline">
                ← Back
            </a>

            <button class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded">
                Add Variant
            </button>

        </div>

    </form>

</div>

</x-layout>
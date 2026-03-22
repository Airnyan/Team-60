<x-layout>

<div class="max-w-6xl mx-auto">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl text-green-400 font-bold">Manage Products</h1>

        <a href="{{ route('admin.products.create') }}"
           class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded">
            + Add Product
        </a>
    </div>
    <form method="GET" action="{{ route('admin.products') }}" class="mb-6 flex gap-4 flex-wrap">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search product name..."
            class="bg-gray-900 border border-green-500 text-white px-4 py-2 rounded w-64"
        >

        <select name="stock_filter" class="bg-gray-900 border border-green-500 text-white px-4 py-2 rounded">
            <option value="">All Stock</option>
            <option value="in_stock" {{ request('stock_filter') == 'in_stock' ? 'selected' : '' }}>In Stock</option>
            <option value="low_stock" {{ request('stock_filter') == 'low_stock' ? 'selected' : '' }}>Low Stock</option>
            <option value="out_of_stock" {{ request('stock_filter') == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
        </select>

        <button type="submit" class="bg-green-500 hover:bg-green-600 text-black px-4 py-2 rounded">
            Filter
        </button>

        <a href="{{ route('admin.products') }}" class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded">
            Reset
        </a>
    </form>

    @foreach($products as $product)
    

    @php
        $totalStock = $product->variants->sum('stock');
        $reserved = $product->variants->sum('reserved_stock');
    @endphp

    <div class="bg-black border border-green-500 rounded-lg mb-6 p-5">

        {{-- PRODUCT HEADER --}}
        <div class="flex justify-between items-center mb-3">
            <div>
                <h2 class="text-xl text-green-300 font-semibold">
                    {{ $product->product_name }}
                </h2>

                <p class="text-sm text-gray-400">
                    Total: {{ $totalStock }} | Reserved: {{ $reserved }}
                </p>
            </div>

            <div class="flex gap-3 text-sm">
                <a href="{{ route('admin.products.edit', $product) }}"
                   class="text-blue-400 hover:underline">
                    Edit
                </a>

                <form method="POST" action="{{ route('admin.products.destroy', $product) }}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500 hover:underline">
                        Delete
                    </button>
                </form>

                <a href="{{ route('admin.variants.create', $product) }}"
                   class="text-green-400 hover:underline">
                    + Variant
                </a>
            </div>
        </div>

        {{-- VARIANTS --}}
        <div class="space-y-2 mt-4">

            @forelse($product->variants as $variant)

            <div class="flex justify-between items-center bg-gray-900 px-4 py-2 rounded">

                <div class="flex gap-6 text-sm">
                    <span class="text-white">Size: {{ $variant->size }}</span>
                    <span>Stock: {{ $variant->stock }}</span>
                    <span>Reserved: {{ $variant->reserved_stock }}</span>
                    <span class="text-green-400 font-semibold">
                        £{{ number_format($variant->price, 2) }}
                    </span>
                </div>
                <div class="flex gap-3 text-sm">

                    <a href="{{ route('admin.variants.edit', $variant) }}"
                       class="text-blue-400 hover:underline">
                        Edit
                    </a>
                </div>

                <form method="POST" action="{{ route('admin.variants.destroy', $variant) }}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500 text-sm hover:underline">
                        Delete
                    </button>
                </form>

            </div>

            @empty
                <p class="text-gray-500 text-sm">No variants yet</p>
            @endforelse

        </div>

    </div>

    @endforeach

</div>

</x-layout>
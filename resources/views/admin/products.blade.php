<x-layout>
<x-slot:title>
    Admin - Manage Products
</x-slot:title>

<div class="container mx-auto py-10 text-white">

    <h1 class="text-3xl font-bold mb-6 text-green-400">
        Admin – Manage Products
    </h1>

    <a href="{{ route('admin.products.create') }}"
   class="bg-green-500 hover:bg-green-600 text-black px-5 py-2 rounded font-bold mb-4 inline-block">
    + Create Product
</a>

    {{-- Search --}}
    <form method="GET" action="{{ route('admin.products') }}" class="mb-6 flex gap-3">
        <input 
            type="text" 
            name="search" 
            value="{{ $search ?? '' }}" 
            placeholder="Search products..."
            class="px-4 py-2 rounded bg-black border border-green-500 
                   text-green-300 w-1/3 placeholder-green-400"
        >
        <button class="bg-green-500 hover:bg-green-600 text-black font-bold px-5 py-2 rounded">
            Search
        </button>
    </form>

    {{-- Success message --}}
    @if(session('success'))
        <div class="bg-green-500 text-black p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Products Table --}}
    <table class="w-full border border-green-500 bg-black text-white rounded-lg overflow-hidden">

        <thead class="bg-green-600 text-black text-lg font-semibold">
            <tr>
                <th class="p-3 border border-green-500">Image</th>
                <th class="p-3 border border-green-500">ID</th>
                <th class="p-3 border border-green-500">Name</th>
                <th class="p-3 border border-green-500">Price</th>
                <th class="p-3 border border-green-500">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($products as $product)
                <tr class="hover:bg-gray-900 transition duration-150">

                    {{-- Image --}}
                    <td class="p-3 border border-green-500">
                        <img 
                            src="{{ asset($product->image) }}"
                            alt="{{ $product->product_name }}"
                            class="w-[70px] h-[70px] object-cover rounded"
                        >
                    </td>

                    {{-- ID --}}
                    <td class="p-3 border border-green-500">
                        {{ $product->id }}
                    </td>

                    {{-- Name --}}
                    <td class="p-3 border border-green-500 text-green-400 font-bold">
                        {{ $product->product_name }}
                    </td>

                    {{-- Price --}}
                    <td class="p-3 border border-green-500 text-green-400 font-bold">
                        £{{ $product->price }}
                    </td>

                    {{-- Actions --}}
                    <td class="p-3 border border-green-500 flex gap-2">

                        {{-- Edit --}}
                        <a href="{{ route('admin.products.edit', $product) }}"
                           class="bg-green-500 hover:bg-green-600 text-black px-3 py-1 rounded font-bold">
                            Edit
                        </a>

                        {{-- Delete --}}
                        <form method="POST"
                              action="{{ route('admin.products.destroy', $product) }}"
                              onsubmit="return confirm('Delete this product?')">
                            @csrf
                            @method('DELETE')

                            <button
                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded font-bold">
                                Delete
                            </button>
                        </form>

                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-4 text-center text-gray-400">
                        No products found.
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>

</div>
</x-layout>

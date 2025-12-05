<x-layout>
    <x-slot:title>
        Admin - Manage Products
    </x-slot:title>

<div class="container mx-auto py-10 text-white">

        <h1 class="text-3xl font-bold mb-6 text-green-400">Admin – Manage Products</h1>

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

        <table class="w-full border border-green-500 bg-black text-white rounded-lg overflow-hidden">
            <thead class="bg-green-600 text-black text-lg font-semibold">
                <tr>
                    <th class="p-3 border border-green-500">Image</th>
                    <th class="p-3 border border-green-500">ID</th>
                    <th class="p-3 border border-green-500">Name</th>
                    <th class="p-3 border border-green-500">Price</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($products as $product)
                    <tr class="hover:bg-gray-900 transition duration-150">
                        
                        <td class="p-3 border border-green-500">
                            <img 
                                src="{{ asset('images/' . $product->image) }}"
                                alt="{{ $product->name }}"
                                class="w-[70px] h-[70px] object-cover rounded"
                            >
                        </td>

                        <td class="p-3 border border-green-500 text-white">
                            {{ $product->id }}
                        </td>

                        <td class="p-3 border border-green-500 text-green-400 font-bold">
                            {{ $product->name }}
                        </td>

                        <td class="p-3 border border-green-500 text-green-400 font-bold">
                            £{{ $product->price }}
                        </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="4" class="p-4 text-center text-gray-400">
                            No products found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

</div>
</x-layout>


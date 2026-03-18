<x-layout>

    <x-slot:title>
        Shop
    </x-slot:title>

    <div class="min-h-screen bg-black text-green-400 py-10">
        <div class="container mx-auto px-4">

            <!-- HEADER -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-green-500">Shop</h1>
                <p class="text-gray-400 mt-2">
                    Browse our collection.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

                <!-- ================= FILTER SIDEBAR ================= -->
                <div class="lg:col-span-1">

                    <form method="GET" action="{{ route('products') }}"
                          class="bg-gray-900 p-6 rounded-2xl border border-green-600">

                        <!-- SEARCH -->
                        <div class="mb-6">
                            <label class="block mb-2 font-semibold">Search</label>
                            <input type="text" name="search"
                                value="{{ request('search') }}"
                                class="w-full p-2 rounded bg-black border border-green-500 text-green-300">
                        </div>

                        <!-- CATEGORY -->
                        <div class="mb-6">
                            <label class="block mb-2 font-semibold">Category</label>
                            <select name="category"
                                class="w-full p-2 rounded bg-black border border-green-500 text-green-300">

                                <option value="">All</option>

                                @foreach(App\Models\ProductType::all() as $type)
                                    <option value="{{ $type->id }}"
                                        {{ request('category') == $type->id ? 'selected' : '' }}>
                                        {{ $type->type_name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <!-- PRICE -->
                        <div class="mb-6">
                            <label class="block mb-2 font-semibold">Price</label>

                            <div class="flex gap-2">
                                <input type="number" name="min_price"
                                    placeholder="Min"
                                    value="{{ request('min_price') }}"
                                    class="w-1/2 p-2 bg-black border border-green-500 rounded">

                                <input type="number" name="max_price"
                                    placeholder="Max"
                                    value="{{ request('max_price') }}"
                                    class="w-1/2 p-2 bg-black border border-green-500 rounded">
                            </div>
                        </div>

                        <button class="w-full bg-green-500 text-black py-2 rounded hover:bg-green-400">
                            Apply
                        </button>

                    </form>

                </div>
                <!-- ================= END FILTER ================= -->


                <!-- ================= PRODUCT GRID ================= -->
                <div class="lg:col-span-3">

                    @if($products->isEmpty())
                        <p class="text-gray-400 text-center py-20">
                            No products found.
                        </p>
                    @endif

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

                        @foreach($products as $product)

                            @php
                                $minPrice = $product->variants->min('price');
                                $totalStock = $product->variants->sum('stock');
                            @endphp

                            <a href="{{ route('product.show', $product->id) }}"
                               class="block bg-gray-900 rounded-2xl p-4 border border-green-700 hover:border-green-400 hover:scale-105 transition">

                                <!-- IMAGE -->
                                <img src="{{ asset($product->image) }}"
                                     class="w-full h-56 object-cover rounded mb-4">

                                <!-- NAME -->
                                <h3 class="text-lg font-bold text-green-400 mb-1">
                                    {{ $product->product_name }}
                                </h3>

                                <!-- DESCRIPTION -->
                                <p class="text-gray-400 text-sm mb-2">
                                    {{ \Illuminate\Support\Str::limit($product->description, 60) }}
                                </p>

                                <!-- PRICE -->
                                <p class="text-green-300 font-semibold text-lg mb-2">
                                    From £{{ number_format($minPrice, 2) }}
                                </p>

                                <!-- STOCK STATUS -->
                                @if($totalStock <= 0)
                                    <span class="text-red-500 text-sm font-semibold">
                                        Out of Stock
                                    </span>
                                @elseif($totalStock <= 10)
                                    <span class="text-yellow-400 text-sm font-semibold">
                                        Low Stock
                                    </span>
                                @else
                                    <span class="text-green-500 text-sm font-semibold">
                                        In Stock
                                    </span>
                                @endif

                            </a>

                        @endforeach

                    </div>

                </div>
                <!-- ================= END GRID ================= -->

            </div>
        </div>
    </div>

</x-layout>
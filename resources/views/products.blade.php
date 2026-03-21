<x-layout>
    <x-slot:title>
        Shop
    </x-slot:title>

    @php
        $allSizes = $products
            ->flatMap(function ($product) {
                $variantSizes = $product->variants->pluck('size')->filter();

                if ($variantSizes->isNotEmpty()) {
                    return $variantSizes;
                }

                return collect([$product->size])->filter();
            })
            ->unique()
            ->sort()
            ->values();

        $allPrices = $products
            ->map(function ($product) {
                $defaultVariant = $product->variants->firstWhere('stock', '>', 0) ?? $product->variants->first();

                if ($defaultVariant) {
                    return $defaultVariant->discounted_price ?? $defaultVariant->price;
                }

                return $product->discounted_price ?? $product->price;
            })
            ->filter();

        $maxPrice = $allPrices->isNotEmpty() ? (int) ceil($allPrices->max()) : 100;
        $selectedCategoryId = request('category');
    @endphp

    <div class="min-h-screen bg-black px-4 py-8 text-white sm:px-6 lg:px-10">
        <div class="mx-auto max-w-7xl">
            <div class="mb-8 rounded-3xl border border-zinc-800 bg-zinc-950 px-6 py-8 shadow-2xl">
                <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                    <div>
                        <p class="mb-2 text-sm font-semibold uppercase tracking-[0.35em] text-green-400">Little Green Man</p>
                        <h1 class="text-3xl font-bold sm:text-4xl">Shop All Products</h1>
                        <p class="mt-3 max-w-2xl text-sm text-zinc-300 sm:text-base">
                            This page now pulls product names, prices, images, categories and variant sizes directly from the database.
                        </p>
                    </div>

                    <div class="w-full lg:max-w-md">
                        <label for="searchInput" class="mb-2 block text-sm font-medium text-zinc-300">Search products</label>
                        <input
                            id="searchInput"
                            type="text"
                            placeholder="Search by product name..."
                            class="w-full rounded-2xl border border-zinc-700 bg-zinc-900 px-4 py-3 text-white outline-none transition focus:border-green-400"
                        >
                    </div>
                </div>
            </div>

            <div class="grid gap-8 lg:grid-cols-[280px_minmax(0,1fr)]">
                <aside class="rounded-3xl border border-zinc-800 bg-zinc-950 p-6 shadow-2xl">
                    <div class="mb-6 flex items-center justify-between">
                        <h2 class="text-xl font-semibold">Filters</h2>
                        <button id="clearAll" type="button" class="text-sm font-semibold text-green-400 hover:text-green-300">
                            Clear all
                        </button>
                    </div>

                    <div class="space-y-8">
                        <div>
                            <h3 class="mb-4 text-sm font-semibold uppercase tracking-[0.25em] text-zinc-400">Categories</h3>
                            <div class="space-y-3">
                                @foreach($categories as $category)
                                    <label class="flex cursor-pointer items-center gap-3 text-sm text-zinc-200">
                                        <input
                                            type="checkbox"
                                            class="category-filter h-4 w-4 rounded border-zinc-600 bg-zinc-900 text-green-500"
                                            value="{{ $category->id }}"
                                            {{ (string) $selectedCategoryId === (string) $category->id ? 'checked' : '' }}
                                        >
                                        <span>{{ $category->type_name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <h3 class="mb-4 text-sm font-semibold uppercase tracking-[0.25em] text-zinc-400">Price</h3>
                            <div class="mb-3 flex items-center justify-between text-sm text-zinc-300">
                                <span>£0</span>
                                <span>£{{ $maxPrice }}</span>
                            </div>
                            <input
                                id="priceRange"
                                type="range"
                                min="0"
                                max="{{ $maxPrice }}"
                                value="{{ $maxPrice }}"
                                class="range range-success range-sm"
                            >
                            <p class="mt-3 text-sm text-zinc-300">Up to <span id="priceValue">£{{ $maxPrice }}</span></p>
                        </div>

                        <div>
                            <h3 class="mb-4 text-sm font-semibold uppercase tracking-[0.25em] text-zinc-400">Sizes</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach($allSizes as $size)
                                    <button
                                        type="button"
                                        class="size-pill rounded-full border border-zinc-700 bg-zinc-900 px-4 py-2 text-sm font-medium text-zinc-200 transition hover:border-green-400 hover:text-green-400"
                                        data-size="{{ $size }}"
                                    >
                                        {{ $size }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </aside>

                <section>
                    <div id="productsGrid" class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                        @forelse($products as $product)
                            @php
                                $defaultVariant = $product->variants->firstWhere('stock', '>', 0) ?? $product->variants->first();
                                $sizes = $product->variants->pluck('size')->filter()->unique()->values();

                                if ($sizes->isEmpty() && !empty($product->size)) {
                                    $sizes = collect([$product->size]);
                                }

                                $displayPrice = $defaultVariant
                                    ? ($defaultVariant->discounted_price ?? $defaultVariant->price)
                                    : ($product->discounted_price ?? $product->price);

                                $originalPrice = $defaultVariant
                                    ? $defaultVariant->price
                                    : $product->price;

                                $image = !empty($product->image)
                                    ? asset($product->image)
                                    : asset('images/items/grid1.png');

                                $categoryName = optional($product->product_type)->type_name ?? 'Uncategorised';
                            @endphp

                            <article
                                class="overflow-hidden rounded-3xl border border-zinc-800 bg-zinc-900 shadow-2xl transition hover:-translate-y-1 hover:border-green-400"
                                data-name="{{ strtolower($product->product_name) }}"
                                data-category-id="{{ $product->product_type_id }}"
                                data-price="{{ $displayPrice }}"
                                data-sizes='@json($sizes->values())'
                            >
                                <a href="{{ route('products.show', $product) }}" class="block">
                                    <div class="aspect-[4/5] overflow-hidden bg-zinc-800">
                                        <img src="{{ $image }}" alt="{{ $product->product_name }}" class="h-full w-full object-cover transition duration-300 hover:scale-105">
                                    </div>
                                </a>

                                <div class="space-y-4 p-5">
                                    <div>
                                        <p class="mb-2 text-xs font-semibold uppercase tracking-[0.25em] text-green-400">{{ $categoryName }}</p>
                                        <a href="{{ route('products.show', $product) }}" class="text-xl font-semibold text-white hover:text-green-400">
                                            {{ $product->product_name }}
                                        </a>
                                        <p class="mt-2 text-sm text-zinc-400">{{ $product->description }}</p>
                                    </div>

                                    <div class="flex items-center justify-between gap-3">
                                        <div>
                                            <p class="text-xl font-bold text-white">£{{ number_format((float) $displayPrice, 2) }}</p>
                                            @if($originalPrice && (float) $originalPrice > (float) $displayPrice)
                                                <p class="text-sm text-zinc-500 line-through">£{{ number_format((float) $originalPrice, 2) }}</p>
                                            @endif
                                        </div>
                                        <a href="{{ route('products.show', $product) }}" class="rounded-full border border-green-500 px-4 py-2 text-sm font-semibold text-green-400 transition hover:bg-green-500 hover:text-black">
                                            View details
                                        </a>
                                    </div>

                                    @if($defaultVariant)
                                        <form action="{{ route('basket.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="variant_id" value="{{ $defaultVariant->id }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="w-full rounded-2xl bg-green-500 px-4 py-3 text-sm font-bold text-black transition hover:bg-green-400">
                                                Add to Basket
                                            </button>
                                        </form>
                                    @else
                                        <button type="button" disabled class="w-full cursor-not-allowed rounded-2xl bg-zinc-700 px-4 py-3 text-sm font-bold text-zinc-300">
                                            No purchasable variant available
                                        </button>
                                    @endif
                                </div>
                            </article>
                        @empty
                            <div class="rounded-3xl border border-zinc-800 bg-zinc-950 p-8 text-zinc-300 lg:col-span-2">
                                No products found.
                            </div>
                        @endforelse
                    </div>

                    <p id="noResults" class="mt-6 hidden rounded-2xl border border-zinc-800 bg-zinc-950 p-4 text-sm text-zinc-300">
                        No products match your current filters.
                    </p>
                </section>
            </div>
        </div>
    </div>

    <script>
        const state = {
            search: '',
            categories: new Set(Array.from(document.querySelectorAll('.category-filter:checked')).map(input => input.value)),
            maxPrice: {{ $maxPrice }},
            size: null,
        };

        const searchInput = document.getElementById('searchInput');
        const priceRange = document.getElementById('priceRange');
        const priceValue = document.getElementById('priceValue');
        const clearAllButton = document.getElementById('clearAll');
        const noResults = document.getElementById('noResults');

        const productNodes = [...document.querySelectorAll('[data-name]')].map(card => ({
            el: card,
            name: card.dataset.name || '',
            categoryId: card.dataset.categoryId || '',
            price: Number(card.dataset.price || 0),
            sizes: JSON.parse(card.dataset.sizes || '[]')
        }));

        function applyFilters() {
            let visibleCount = 0;

            productNodes.forEach(product => {
                let show = true;

                if (state.search && !product.name.includes(state.search)) {
                    show = false;
                }

                if (show && state.categories.size && !state.categories.has(product.categoryId)) {
                    show = false;
                }

                if (show && product.price > state.maxPrice) {
                    show = false;
                }

                if (show && state.size && !product.sizes.includes(state.size)) {
                    show = false;
                }

                product.el.style.display = show ? '' : 'none';

                if (show) {
                    visibleCount++;
                }
            });

            noResults.classList.toggle('hidden', visibleCount !== 0);
        }

        searchInput.addEventListener('input', event => {
            state.search = event.target.value.trim().toLowerCase();
            applyFilters();
        });

        priceRange.addEventListener('input', event => {
            state.maxPrice = Number(event.target.value);
            priceValue.textContent = '£' + state.maxPrice;
            applyFilters();
        });

        document.querySelectorAll('.category-filter').forEach(input => {
            input.addEventListener('change', event => {
                if (event.target.checked) {
                    state.categories.add(event.target.value);
                } else {
                    state.categories.delete(event.target.value);
                }

                applyFilters();
            });
        });

        document.querySelectorAll('.size-pill').forEach(button => {
            button.addEventListener('click', () => {
                const selectedSize = button.dataset.size;

                if (state.size === selectedSize) {
                    state.size = null;
                    button.classList.remove('border-green-400', 'text-green-400');
                    button.classList.add('border-zinc-700', 'text-zinc-200');
                } else {
                    state.size = selectedSize;

                    document.querySelectorAll('.size-pill').forEach(item => {
                        item.classList.remove('border-green-400', 'text-green-400');
                        item.classList.add('border-zinc-700', 'text-zinc-200');
                    });

                    button.classList.remove('border-zinc-700', 'text-zinc-200');
                    button.classList.add('border-green-400', 'text-green-400');
                }

                applyFilters();
            });
        });

        clearAllButton.addEventListener('click', () => {
            state.search = '';
            state.categories.clear();
            state.maxPrice = {{ $maxPrice }};
            state.size = null;

            searchInput.value = '';
            priceRange.value = {{ $maxPrice }};
            priceValue.textContent = '£{{ $maxPrice }}';

            document.querySelectorAll('.category-filter').forEach(input => {
                input.checked = false;
            });

            document.querySelectorAll('.size-pill').forEach(button => {
                button.classList.remove('border-green-400', 'text-green-400');
                button.classList.add('border-zinc-700', 'text-zinc-200');
            });

            applyFilters();
        });

        applyFilters();
    </script>
</x-layout>
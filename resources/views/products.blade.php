<x-layout>
    <x-slot:title>
        Shop Page
    </x-slot:title>

    @vite('resources/css/styles.css')

    @php
        $allCategories = $products
            ->map(fn($product) => optional($product->product_type)->type_name)
            ->filter()
            ->unique()
            ->sort()
            ->values();

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

        $allColors = $products
            ->map(function ($product) {
                preg_match('/\((.*?)\)/', $product->product_name ?? '', $matches);
                return $matches[1] ?? null;
            })
            ->filter()
            ->unique()
            ->sort()
            ->values();

        $allPrices = $products
            ->map(function ($product) {
                $defaultVariant = $product->variants->where('stock', '>', 0)->sortBy('id')->first()
                    ?? $product->variants->sortBy('id')->first();

                if ($defaultVariant) {
                    return $defaultVariant->discounted_price ?? $defaultVariant->price;
                }

                return $product->discounted_price ?? $product->price;
            })
            ->filter();

        $maxPrice = $allPrices->isNotEmpty() ? (int) ceil($allPrices->max()) : 500;
        $maxPrice = $maxPrice > 0 ? $maxPrice : 500;
    @endphp

    <div class="page">
        <header class="page-header">
            <div>
                <h1 class="title">New Arrivals</h1>
                <p class="subtitle">
                    Discover our latest collection of minimalist essentials,<br />
                    crafted for the modern wardrobe.
                </p>
            </div>
            <div class="search-wrapper">
                <input
                    id="searchInput"
                    type="text"
                    placeholder="Search products..."
                    aria-label="Search products"
                />
            </div>
        </header>

        <main class="layout">
            <aside class="filters">
                <div class="filters-header">
                    <h2>Filters</h2>
                    <button id="clearAll" class="link-button" type="button">Clear all</button>
                </div>

                <section class="filter-group">
                    <button class="filter-toggle" type="button">
                        <span>Category</span>
                        <span class="chevron">⌃</span>
                    </button>
                    <div class="filter-body">
                        @forelse($allCategories as $category)
                            <label class="checkbox-row">
                                <input
                                    type="checkbox"
                                    class="category-filter"
                                    value="{{ $category }}"
                                />
                                <span>{{ $category }}</span>
                            </label>
                        @empty
                            <p>No categories available.</p>
                        @endforelse
                    </div>
                </section>

                <section class="filter-group">
                    <button class="filter-toggle" type="button">
                        <span>Price Range</span>
                        <span class="chevron">⌃</span>
                    </button>
                    <div class="filter-body">
                        <div class="price-row">
                            <span>£0</span>
                            <span>£{{ $maxPrice }}</span>
                        </div>
                        <input
                            id="priceRange"
                            type="range"
                            min="0"
                            max="{{ $maxPrice }}"
                            value="{{ $maxPrice }}"
                        />
                        <div class="price-value">Up to <span id="priceValue">£{{ $maxPrice }}</span></div>
                    </div>
                </section>

                <section class="filter-group">
                    <button class="filter-toggle" type="button">
                        <span>Size</span>
                        <span class="chevron">⌃</span>
                    </button>
                    <div class="filter-body size-grid">
                        @forelse($allSizes as $size)
                            <button type="button" class="size-pill" data-size="{{ $size }}">{{ $size }}</button>
                        @empty
                            <p>No sizes available.</p>
                        @endforelse
                    </div>
                </section>

                @if($allColors->count())
                    <section class="filter-group">
                        <button class="filter-toggle" type="button">
                            <span>Color</span>
                            <span class="chevron">⌃</span>
                        </button>
                        <div class="filter-body color-grid">
                            @foreach($allColors as $color)
                                <button type="button" class="color-pill" data-color="{{ $color }}">{{ $color }}</button>
                            @endforeach
                        </div>
                    </section>
                @endif
            </aside>

            <section class="products-section">
                <div id="productsGrid" class="products-grid" aria-live="polite">
                    @foreach($products as $product)
                        @php
                            $defaultVariant = $product->variants->where('stock', '>', 0)->sortBy('id')->first()
                                ?? $product->variants->sortBy('id')->first();

                            $sizes = $product->variants->pluck('size')->filter()->unique()->values();
                            if ($sizes->isEmpty() && !empty($product->size)) {
                                $sizes = collect([$product->size]);
                            }

                            preg_match('/\((.*?)\)/', $product->product_name ?? '', $matches);
                            $color = $matches[1] ?? null;
                            $colors = $color ? collect([$color]) : collect([]);

                            $currentPrice = $defaultVariant
                                ? ($defaultVariant->discounted_price ?? $defaultVariant->price)
                                : ($product->discounted_price ?? $product->price);

                            $originalPrice = $defaultVariant
                                ? $defaultVariant->price
                                : $product->price;

                            $image = !empty($product->image)
                                ? asset($product->image)
                                : asset('images/grid1.png');

                            $category = optional($product->product_type)->type_name ?? 'Uncategorised';
                            $name = $product->product_name ?? 'Unnamed Product';
                            $slug = \Illuminate\Support\Str::slug($name);
                            $isNew = $product->created_at && $product->created_at->gt(now()->subDays(30));
                        @endphp

                        <article
                            class="product-card"
                            data-name="{{ strtolower($name) }}"
                            data-slug="{{ strtolower($slug) }}"
                            data-category="{{ $category }}"
                            data-price="{{ $currentPrice }}"
                            data-sizes='@json($sizes->values())'
                            data-colors='@json($colors->values())'
                        >
                            <div class="product-media">
                                <img src="{{ $image }}" alt="{{ $name }}" />
                                @if($isNew)
                                    <div class="badge">NEW ARRIVAL</div>
                                @endif
                            </div>

                            <div class="product-info">
                                <p class="product-name">{{ $name }}</p>

                                @if(!empty($product->description))
                                    <p class="product-description">{{ $product->description }}</p>
                                @endif

                                <p class="product-price">
                                    £{{ number_format((float) $currentPrice, 2) }}
                                    @if($originalPrice && (float) $originalPrice > (float) $currentPrice)
                                        <span style="text-decoration: line-through; opacity: 0.7; margin-left: 8px;">
                                            £{{ number_format((float) $originalPrice, 2) }}
                                        </span>
                                    @endif
                                </p>

                                @if($defaultVariant)
                                    <form action="{{ route('basket.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="variant_id" value="{{ $defaultVariant->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="add-to-basket-button">
                                            Add to basket
                                        </button>
                                    </form>
                                @else
                                    <button type="button" class="add-to-basket-button" disabled>
                                        Unavailable
                                    </button>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>

                <p id="noResults" class="no-results" hidden>No products match your filters.</p>
            </section>
        </main>
    </div>

    <script>
        const state = {
            search: "",
            categories: new Set(),
            maxPrice: {{ $maxPrice }},
            size: null,
            color: null
        };

        const searchInput = document.getElementById("searchInput");
        const priceRange = document.getElementById("priceRange");
        const priceValue = document.getElementById("priceValue");
        const clearAllButton = document.getElementById("clearAll");
        const noResults = document.getElementById("noResults");

        const productNodes = [...document.querySelectorAll(".product-card")].map(card => ({
            el: card,
            name: card.dataset.name || "",
            slug: card.dataset.slug || "",
            category: card.dataset.category || "",
            price: Number(card.dataset.price || 0),
            sizes: JSON.parse(card.dataset.sizes || "[]"),
            colors: JSON.parse(card.dataset.colors || "[]")
        }));

        function applyFilters() {
            let visibleCount = 0;

            productNodes.forEach(p => {
                let show = true;

                if (state.search) {
                    const t = state.search.toLowerCase();
                    if (!p.name.includes(t) && !p.slug.includes(t)) {
                        show = false;
                    }
                }

                if (show && state.categories.size && !state.categories.has(p.category)) {
                    show = false;
                }

                if (show && p.price > state.maxPrice) {
                    show = false;
                }

                if (show && state.size) {
                    if (!p.sizes.includes(state.size)) {
                        show = false;
                    }
                }

                if (show && state.color) {
                    if (!p.colors.includes(state.color)) {
                        show = false;
                    }
                }

                p.el.style.display = show ? "" : "none";

                if (show) {
                    visibleCount++;
                }
            });

            noResults.hidden = visibleCount !== 0;
        }

        searchInput.addEventListener("input", e => {
            state.search = e.target.value.trim().toLowerCase();
            applyFilters();
        });

        priceRange.addEventListener("input", e => {
            state.maxPrice = Number(e.target.value);
            priceValue.textContent = "£" + state.maxPrice;
            applyFilters();
        });

        document.querySelectorAll(".category-filter").forEach(cb => {
            cb.addEventListener("change", e => {
                if (e.target.checked) {
                    state.categories.add(e.target.value);
                } else {
                    state.categories.delete(e.target.value);
                }
                applyFilters();
            });
        });

        document.querySelectorAll(".size-pill").forEach(btn => {
            btn.addEventListener("click", () => {
                const s = btn.dataset.size;

                if (state.size === s) {
                    state.size = null;
                    btn.classList.remove("is-active");
                } else {
                    state.size = s;
                    document.querySelectorAll(".size-pill").forEach(b => b.classList.remove("is-active"));
                    btn.classList.add("is-active");
                }

                applyFilters();
            });
        });

        document.querySelectorAll(".color-pill").forEach(btn => {
            btn.addEventListener("click", () => {
                const c = btn.dataset.color;

                if (state.color === c) {
                    state.color = null;
                    btn.classList.remove("is-active");
                } else {
                    state.color = c;
                    document.querySelectorAll(".color-pill").forEach(b => b.classList.remove("is-active"));
                    btn.classList.add("is-active");
                }

                applyFilters();
            });
        });

        clearAllButton.addEventListener("click", () => {
            state.search = "";
            state.categories.clear();
            state.maxPrice = {{ $maxPrice }};
            state.size = null;
            state.color = null;

            searchInput.value = "";
            priceRange.value = {{ $maxPrice }};
            priceValue.textContent = "£{{ $maxPrice }}";

            document.querySelectorAll(".category-filter").forEach(cb => cb.checked = false);
            document.querySelectorAll(".size-pill").forEach(b => b.classList.remove("is-active"));
            document.querySelectorAll(".color-pill").forEach(b => b.classList.remove("is-active"));

            applyFilters();
        });

        document.querySelectorAll(".filter-toggle").forEach(t => {
            t.addEventListener("click", () => {
                t.closest(".filter-group").classList.toggle("is-collapsed");
            });
        });

        applyFilters();
    </script>
</x-layout>
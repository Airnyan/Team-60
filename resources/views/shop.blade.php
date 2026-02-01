<x-layout>
    <x-slot:title>
        Shop Page
    </x-slot:title>

    @vite('resources/css/styles.css')

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
                        <label class="checkbox-row">
                            <input type="checkbox" class="category-filter" value="T shirts" />
                            <span>T shirts</span>
                        </label>
                        <label class="checkbox-row">
                            <input type="checkbox" class="category-filter" value="Hoodies" />
                            <span>Hoodies</span>
                        </label>
                        <label class="checkbox-row">
                            <input type="checkbox" class="category-filter" value="Tracksuits" />
                            <span>Tracksuits</span>
                        </label>
                        <label class="checkbox-row">
                            <input type="checkbox" class="category-filter" value="Caps" />
                            <span>Caps</span>
                        </label>
                        <label class="checkbox-row">
                            <input type="checkbox" class="category-filter" value="Hats" />
                            <span>Hats</span>
                        </label>
                        <label class="checkbox-row">
                            <input type="checkbox" class="category-filter" value="Posters" />
                            <span>Posters</span>
                        </label>
                        <label class="checkbox-row">
                            <input type="checkbox" class="category-filter" value="Stickers" />
                            <span>Stickers</span>
                        </label>
                        <label class="checkbox-row">
                            <input type="checkbox" class="category-filter" value="Sun glasses" />
                            <span>Sun glasses</span>
                        </label>
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
                            <span>£500</span>
                        </div>
                        <input id="priceRange" type="range" min="0" max="500" value="500" />
                        <div class="price-value">Up to <span id="priceValue">£500</span></div>
                    </div>
                </section>

                <section class="filter-group">
                    <button class="filter-toggle" type="button">
                        <span>Size</span>
                        <span class="chevron">⌃</span>
                    </button>
                    <div class="filter-body size-grid">
                        <button type="button" class="size-pill" data-size="XS">XS</button>
                        <button type="button" class="size-pill" data-size="S">S</button>
                        <button type="button" class="size-pill" data-size="M">M</button>
                        <button type="button" class="size-pill" data-size="L">L</button>
                        <button type="button" class="size-pill" data-size="XL">XL</button>
                    </div>
                </section>

                <section class="filter-group">
                    <button class="filter-toggle" type="button">
                        <span>Color</span>
                    </button>
                    <div class="filter-body color-grid">
                        <button type="button" class="color-pill" data-color="Neutral">Neutral</button>
                        <button type="button" class="color-pill" data-color="Black">Black</button>
                        <button type="button" class="color-pill" data-color="White">White</button>
                        <button type="button" class="color-pill" data-color="Denim">Denim</button>
                    </div>
                </section>
            </aside>

            <section class="products-section">
                <div id="productsGrid" class="products-grid" aria-live="polite">
                    @foreach($products as $product)
                        @php
                            $sizes = is_array($product->size) ? $product->size : json_decode($product->size ?? '[]', true);
                            // $colors = is_array($product->colors) ? $product->colors : json_decode($product->colors ?? '[]', true);
                            $image = $product->image ? asset($product->image) : asset('images/grid1.png');
                        @endphp

                        <article
                            class="product-card"
                            data-name="{{ strtolower($product->product_name) }}"
                            {{-- data-slug="{{ strtolower($product->slug) }}" --}}
                            data-category="{{ $product->product_type->type_name }}"
                            data-price="{{ $product->price }}"
                            data-sizes='@json($sizes)'
                            {{-- data-colors='@json($colors)' --}}
                        >
                            <div class="product-media">
                                <img src="{{ $image }}" alt="{{ $product->product_name }}" />
                                {{-- @if($product->is_new)
                                    <div class="badge">NEW ARRIVAL</div>
                                @endif --}}
                            </div>

                            <div class="product-info">
                                <p class="product-name">{{ $product->product_name }}</p>
                                <p class="product-price">£{{ number_format($product->price, 2) }}</p>

                                <form action="{{ route('basket.add', $product) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="add-to-basket-button">
                                        Add to basket
                                    </button>
                                </form>
                            </div>
                        </article>
                    @endforeach
                </div>

                <p id="noResults" class="no-results" hidden>No products match your filters.</p>
            </section>
        </main>
    </div>

    <script>
        const state = { search: "", categories: new Set(), maxPrice: 500, size: null, color: null };

        const searchInput = document.getElementById("searchInput");
        const productsGrid = document.getElementById("productsGrid");
        const priceRange = document.getElementById("priceRange");
        const priceValue = document.getElementById("priceValue");
        const clearAllButton = document.getElementById("clearAll");
        const noResults = document.getElementById("noResults");

        const productNodes = [...document.querySelectorAll(".product-card")].map(card => ({
            el: card,
            name: card.dataset.name,
            slug: card.dataset.slug,
            category: card.dataset.category,
            price: Number(card.dataset.price),
            sizes: JSON.parse(card.dataset.sizes),
            colors: JSON.parse(card.dataset.colors)
        }));

        function applyFilters() {
            let visibleCount = 0;

            productNodes.forEach(p => {
                let show = true;

                if (state.search) {
                    const t = state.search.toLowerCase();
                    if (!p.name.includes(t) && !p.slug.includes(t)) show = false;
                }

                if (show && state.categories.size && !state.categories.has(p.category)) show = false;

                if (show && p.price > state.maxPrice) show = false;

                if (show && state.size) {
                    if (!p.sizes.includes(state.size)) show = false;
                }

                if (show && state.color) {
                    if (!p.colors.includes(state.color)) show = false;
                }

                p.el.style.display = show ? "" : "none";
                if (show) visibleCount++;
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
                if (e.target.checked) state.categories.add(e.target.value);
                else state.categories.delete(e.target.value);
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
            state.maxPrice = 500;
            state.size = null;
            state.color = null;

            searchInput.value = "";
            priceRange.value = 500;
            priceValue.textContent = "£500";

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

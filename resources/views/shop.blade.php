{{-- 
    NOTE:
    Standard HTML & layout are already handled by views/components/layout.blade.php
    Just put your page content inside the <x-layout> tags.
--}}

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
                    <button class="filter-toggle" type="button" data-target="categoryList">
                        <span>Category</span>
                        <span class="chevron">⌃</span>
                    </button>
                    <div id="categoryList" class="filter-body">
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
                    <button class="filter-toggle" type="button" data-target="priceList">
                        <span>Price Range</span>
                        <span class="chevron">⌃</span>
                    </button>
                    <div id="priceList" class="filter-body">
                        <div class="price-row">
                            <span>£0</span>
                            <span>£500</span>
                        </div>
                        <input
                            id="priceRange"
                            type="range"
                            min="0"
                            max="500"
                            value="500"
                        />
                        <div class="price-value">Up to <span id="priceValue">£500</span></div>
                    </div>
                </section>

                <section class="filter-group">
                    <button class="filter-toggle" type="button" data-target="sizeList">
                        <span>Size</span>
                        <span class="chevron">⌃</span>
                    </button>
                    <div id="sizeList" class="filter-body size-grid">
                        <button type="button" class="size-pill" data-size="XS">XS</button>
                        <button type="button" class="size-pill" data-size="S">S</button>
                        <button type="button" class="size-pill" data-size="M">M</button>
                        <button type="button" class="size-pill" data-size="L">L</button>
                        <button type="button" class="size-pill" data-size="XL">XL</button>
                    </div>
                </section>


                <section class="filter-group">
                    <button class="filter-toggle" type="button" data-target="colorList">
                        <span>Color</span>
                    </button>
                    <div id="colorList" class="filter-body color-grid">
                        <button type="button" class="color-pill" data-color="Neutral">
                            Neutral
                        </button>
                        <button type="button" class="color-pill" data-color="Black">
                            Black
                        </button>
                        <button type="button" class="color-pill" data-color="White">
                            White
                        </button>
                        <button type="button" class="color-pill" data-color="Denim">
                            Denim
                        </button>
                    </div>
                </section>
            </aside>


            <section class="products-section">
                <div id="productsGrid" class="products-grid" aria-live="polite"></div>
                <p id="noResults" class="no-results" hidden>
                    No products match your filters. Try adjusting your selection.
                </p>
            </section>
        </main>
    </div>

    <script>

        const products = [
            {
                id: 1,
                name: "Oversized Logo Tee",
                slug: "Oversized Logo Tee",
                price: 35,
                category: "T shirts",
                sizes: ["S", "M", "L", "XL"],
                colors: ["White", "Neutral"],
                isNew: true,
                image:
                    "{{ asset('images/grid1.png') }}"
            },
            {
                id: 2,
                name: "Noir Street Hoodie",
                slug: "Noir Street Hoodie",
                price: 65,
                category: "Hoodies",
                sizes: ["M", "L", "XL"],
                colors: ["Black"],
                isNew: true,
                image:
                    "{{ asset('images/grid2.png') }}"
            },
            {
                id: 3,
                name: "Sandstone Tracksuit",
                slug: "Sandstone Tracksuit",
                price: 110,
                category: "Tracksuits",
                sizes: ["S", "M", "L"],
                colors: ["Neutral"],
                isNew: false,
                image:
                    "{{ asset('images/grid3.png') }}"
            },
            {
                id: 4,
                name: "Washed Denim Cap",
                slug: "Washed Denim Cap",
                price: 28,
                category: "Caps",
                sizes: [],
                colors: ["Denim"],
                isNew: true,
                image:
                    "{{ asset('images/grid4.png') }}"
            },
            {
                id: 5,
                name: "Minimalist Wool Hat",
                slug: "Minimalist Wool Hat",
                price: 40,
                category: "Hats",
                sizes: [],
                colors: ["Neutral", "Black"],
                isNew: false,
                image:
                    "{{ asset('images/grid1.png') }}"
            },
            {
                id: 6,
                name: "Monochrome Wall Poster",
                slug: "Monochrome Wall Poster",
                price: 22,
                category: "Posters",
                sizes: [],
                colors: ["Black", "White"],
                isNew: true,
                image:
                   "{{ asset('images/grid2.png') }}"
            },
            {
                id: 7,
                name: "Sticker Pack – Essentials",
                slug: "Sticker Pack Essentials",
                price: 12,
                category: "Stickers",
                sizes: [],
                colors: ["Neutral"],
                isNew: true,
                image:
                    "{{ asset('images/grid3.png') }}"
            },
            {
                id: 8,
                name: "Matte Black Sun Glasses",
                slug: "Matte Black Sunglasses",
                price: 55,
                category: "Sun glasses",
                sizes: [],
                colors: ["Black"],
                isNew: false,
                image:
                   "{{ asset('images/grid4.png') }}"
            },
            {
                id: 9,
                name: "Everyday Essentials Tee",
                slug: "Everyday Essentials Tee",
                price: 30,
                category: "T shirts",
                sizes: ["XS", "S", "M"],
                colors: ["White"],
                isNew: false,
                image:
                    "{{ asset('images/grid1.png') }}"
            }
        ];

        const state = {
            search: "",
            categories: new Set(),
            maxPrice: 500,
            size: null,
            color: null
        };

        const productsGrid = document.getElementById("productsGrid");
        const searchInput = document.getElementById("searchInput");
        const priceRange = document.getElementById("priceRange");
        const priceValue = document.getElementById("priceValue");
        const clearAllButton = document.getElementById("clearAll");
        const noResults = document.getElementById("noResults");

        function renderProducts() {
            productsGrid.innerHTML = "";

            const filtered = products.filter((product) => {

                if (state.search) {
                    const term = state.search.toLowerCase();
                    const matchesName =
                        product.name.toLowerCase().includes(term) ||
                        (product.slug && product.slug.toLowerCase().includes(term));
                    if (!matchesName) return false;
                }


                if (state.categories.size > 0 && !state.categories.has(product.category)) {
                    return false;
                }


                if (product.price > state.maxPrice) {
                    return false;
                }


                if (state.size && product.sizes.length > 0) {
                    if (!product.sizes.includes(state.size)) return false;
                } else if (state.size && product.sizes.length === 0) {
                    return false;
                }

 
                if (state.color && !product.colors.includes(state.color)) {
                    return false;
                }

                return true;
            });

            if (filtered.length === 0) {
                noResults.hidden = false;
                return;
            }

            noResults.hidden = true;

            filtered.forEach((product) => {
                const card = document.createElement("article");
                card.className = "product-card";

                const media = document.createElement("div");
                media.className = "product-media";

                const img = document.createElement("img");
                img.src = product.image;
                img.alt = product.name;

                media.appendChild(img);

                if (product.isNew) {
                    const badge = document.createElement("div");
                    badge.className = "badge";
                    badge.textContent = "NEW ARRIVAL";
                    media.appendChild(badge);
                }

                const info = document.createElement("div");
                info.className = "product-info";

                const name = document.createElement("p");
                name.className = "product-name";
                name.textContent = product.name;

                const price = document.createElement("p");
                price.className = "product-price";
                price.textContent = `£${product.price.toFixed(2)}`;

                info.appendChild(name);
                info.appendChild(price);

                card.appendChild(media);
                card.appendChild(info);
                productsGrid.appendChild(card);
            });
        }


        searchInput.addEventListener("input", (e) => {
            state.search = e.target.value.trim();
            renderProducts();
        });

        priceRange.addEventListener("input", (e) => {
            state.maxPrice = Number(e.target.value);
            priceValue.textContent = `£${state.maxPrice}`;
            renderProducts();
        });


        document.querySelectorAll(".category-filter").forEach((checkbox) => {
            checkbox.addEventListener("change", (e) => {
                const value = e.target.value;
                if (e.target.checked) {
                    state.categories.add(value);
                } else {
                    state.categories.delete(value);
                }
                renderProducts();
            });
        });


        document.querySelectorAll(".size-pill").forEach((pill) => {
            pill.addEventListener("click", () => {
                const size = pill.dataset.size;

                if (state.size === size) {
                    state.size = null;
                    pill.classList.remove("is-active");
                } else {
                    state.size = size;
                    document
                        .querySelectorAll(".size-pill")
                        .forEach((p) => p.classList.remove("is-active"));
                    pill.classList.add("is-active");
                }
                renderProducts();
            });
        });

        document.querySelectorAll(".color-pill").forEach((pill) => {
            pill.addEventListener("click", () => {
                const color = pill.dataset.color;

                if (state.color === color) {
                    state.color = null;
                    pill.classList.remove("is-active");
                } else {
                    state.color = color;
                    document
                        .querySelectorAll(".color-pill")
                        .forEach((p) => p.classList.remove("is-active"));
                    pill.classList.add("is-active");
                }
                renderProducts();
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

            document.querySelectorAll(".category-filter").forEach((cb) => {
                cb.checked = false;
            });

            document
                .querySelectorAll(".size-pill")
                .forEach((pill) => pill.classList.remove("is-active"));

            document
                .querySelectorAll(".color-pill")
                .forEach((pill) => pill.classList.remove("is-active"));

            renderProducts();
        });


        document.querySelectorAll(".filter-toggle").forEach((btn) => {
            btn.addEventListener("click", () => {
                const group = btn.closest(".filter-group");
                group.classList.toggle("is-collapsed");
            });
        });

        renderProducts();
    </script>

</x-layout>

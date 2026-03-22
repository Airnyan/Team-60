<x-layout>
    <x-slot:title>
        {{ $product->product_name }}
    </x-slot:title>

    @php
        $image = !empty($product->image)
            ? asset($product->image)
            : asset('images/items/grid1.png');

        $variantPayload = $product->variants->map(function ($variant) {
            return [
                'id' => $variant->id,
                'name' => $variant->variant_name,
                'size' => $variant->size,
                'stock' => (int) $variant->stock,
                'price' => (float) $variant->price,
                'discounted_price' => $variant->discounted_price !== null ? (float) $variant->discounted_price : null,
            ];
        })->values();

        $startingPrice = $defaultVariant
            ? ($defaultVariant->discounted_price ?? $defaultVariant->price)
            : ($product->discounted_price ?? $product->price);

        $startingOriginalPrice = $defaultVariant
            ? $defaultVariant->price
            : $product->price;

        $startingStock = $defaultVariant->stock ?? $product->current_stock;
    @endphp

    <div class="min-h-screen bg-black px-4 py-8 text-white sm:px-6 lg:px-10">
        <div class="mx-auto max-w-7xl">
            <a href="{{ route('shop') }}" class="mb-6 inline-flex items-center gap-2 text-sm font-semibold text-green-400 hover:text-green-300">
                ← Back to shop
            </a>

            <div class="grid gap-8 lg:grid-cols-[1.05fr_0.95fr]">
                <div class="overflow-hidden rounded-3xl border border-zinc-800 bg-zinc-950 shadow-2xl">
                    <div class="aspect-square bg-zinc-900">
                        <img src="{{ $image }}" alt="{{ $product->product_name }}" class="h-full w-full object-cover">
                    </div>
                </div>

                <div
                    id="productDetail"
                    class="rounded-3xl border border-zinc-800 bg-zinc-950 p-6 shadow-2xl"
                    data-variants='@json($variantPayload)'
                >
                    <p class="mb-3 text-sm font-semibold uppercase tracking-[0.35em] text-green-400">
                        {{ optional($product->product_type)->type_name ?? 'Product' }}
                    </p>
                    <h1 class="text-3xl font-bold sm:text-4xl">{{ $product->product_name }}</h1>
                    <p class="mt-4 text-base leading-7 text-zinc-300">{{ $product->description }}</p>

                    <div class="mt-6 rounded-2xl border border-zinc-800 bg-zinc-900 p-5">
                        <div class="flex flex-wrap items-end gap-3">
                            <p id="currentPrice" class="text-3xl font-bold text-white">£{{ number_format((float) $startingPrice, 2) }}</p>
                            <p
                                id="originalPrice"
                                class="text-lg text-zinc-500 line-through {{ ($startingOriginalPrice && (float) $startingOriginalPrice > (float) $startingPrice) ? '' : 'hidden' }}"
                            >
                                £{{ number_format((float) $startingOriginalPrice, 2) }}
                            </p>
                        </div>

                        <div class="mt-4 grid gap-4 sm:grid-cols-2">
                            <div class="rounded-2xl border border-zinc-800 bg-black/40 p-4">
                                <p class="text-xs uppercase tracking-[0.25em] text-zinc-500">Stock level</p>
                                <p id="stockLevel" class="mt-2 text-xl font-semibold text-white">{{ $startingStock }}</p>
                            </div>
                            <div class="rounded-2xl border border-zinc-800 bg-black/40 p-4">
                                <p class="text-xs uppercase tracking-[0.25em] text-zinc-500">Product category</p>
                                <p class="mt-2 text-xl font-semibold text-white">{{ optional($product->product_type)->type_name ?? 'Uncategorised' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h2 class="mb-3 text-sm font-semibold uppercase tracking-[0.25em] text-zinc-400">Choose size</h2>

                        @if($product->variants->count())
                            <div class="flex flex-wrap gap-3" id="sizeOptions">
                                @foreach($product->variants as $variant)
                                    @php
                                        $isSelected = $defaultVariant && $defaultVariant->id === $variant->id;
                                    @endphp
                                    <button
                                        type="button"
                                        class="variant-button rounded-full border px-5 py-2 text-sm font-semibold transition {{ $isSelected ? 'border-green-400 bg-green-500 text-black' : 'border-zinc-700 bg-zinc-900 text-zinc-200 hover:border-green-400 hover:text-green-400' }}"
                                        data-variant-id="{{ $variant->id }}"
                                    >
                                        {{ $variant->size }}
                                    </button>
                                @endforeach
                            </div>
                        @else
                            <p class="rounded-2xl border border-zinc-800 bg-zinc-900 p-4 text-sm text-zinc-300">
                                No product variants are available for this item yet.
                            </p>
                        @endif
                    </div>

                    <form action="{{ route('basket.add') }}" method="POST" class="mt-8 space-y-4" id="addToBasketForm">
                        @csrf
                        <input type="hidden" name="variant_id" id="selectedVariantId" value="{{ $defaultVariant->id ?? '' }}">
                        <input type="hidden" name="quantity" value="1">

                        <button
                            type="submit"
                            id="addToBasketButton"
                            class="w-full rounded-2xl bg-green-500 px-5 py-4 text-base font-bold text-black transition hover:bg-green-400 disabled:cursor-not-allowed disabled:bg-zinc-700 disabled:text-zinc-300"
                            {{ $defaultVariant ? '' : 'disabled' }}
                        >
                            Add to Basket
                        </button>

                        @if(session('success'))
                            <p class="rounded-2xl border border-green-500/30 bg-green-500/10 p-3 text-sm text-green-300">
                                {{ session('success') }}
                            </p>
                        @endif
                    </form>
                </div>
            </div>

            <section class="mt-10 rounded-3xl border border-zinc-800 bg-zinc-950 p-6 shadow-2xl">
                <h2 class="text-2xl font-bold text-white">Ratings & Reviews</h2>
                <div class="mt-4 rounded-2xl border border-dashed border-zinc-700 bg-zinc-900/70 p-8 text-zinc-400">
                    Section left for Mishan.
                </div>
            </section>
        </div>
    </div>

    <script>
        const productDetail = document.getElementById('productDetail');

        if (productDetail) {
            const variants = JSON.parse(productDetail.dataset.variants || '[]');
            const currentPrice = document.getElementById('currentPrice');
            const originalPrice = document.getElementById('originalPrice');
            const stockLevel = document.getElementById('stockLevel');
            const selectedVariantId = document.getElementById('selectedVariantId');
            const addToBasketButton = document.getElementById('addToBasketButton');
            const variantButtons = document.querySelectorAll('.variant-button');

            function formatPrice(value) {
                return '£' + Number(value).toFixed(2);
            }

            function setVariant(variantId) {
                const variant = variants.find(item => String(item.id) === String(variantId));

                if (!variant) {
                    return;
                }

                selectedVariantId.value = variant.id;
                currentPrice.textContent = formatPrice(variant.discounted_price ?? variant.price);
                stockLevel.textContent = variant.stock;

                if (variant.discounted_price !== null && Number(variant.price) > Number(variant.discounted_price)) {
                    originalPrice.textContent = formatPrice(variant.price);
                    originalPrice.classList.remove('hidden');
                } else {
                    originalPrice.classList.add('hidden');
                }

                addToBasketButton.disabled = Number(variant.stock) < 1;
                addToBasketButton.textContent = Number(variant.stock) < 1 ? 'Out of Stock' : 'Add to Basket';

                variantButtons.forEach(button => {
                    const isActive = String(button.dataset.variantId) === String(variant.id);
                    button.classList.toggle('border-green-400', isActive);
                    button.classList.toggle('bg-green-500', isActive);
                    button.classList.toggle('text-black', isActive);
                    button.classList.toggle('border-zinc-700', !isActive);
                    button.classList.toggle('bg-zinc-900', !isActive);
                    button.classList.toggle('text-zinc-200', !isActive);
                });
            }

            variantButtons.forEach(button => {
                button.addEventListener('click', () => {
                    setVariant(button.dataset.variantId);
                });
            });

            if (variants.length && selectedVariantId.value) {
                setVariant(selectedVariantId.value);
            }
        }
    </script>
</x-layout>
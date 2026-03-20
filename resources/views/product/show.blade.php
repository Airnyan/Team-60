<x-layout>

    <x-slot:title>
        {{ $product->product_name }}
    </x-slot:title>

    <div class="min-h-screen bg-black text-green-400 py-10">
        <div class="container mx-auto px-4">

            <div class="grid md:grid-cols-2 gap-10">

                <!-- ================= IMAGE ================= -->
                <div>
                    <img src="{{ asset($product->image) }}"
                         class="w-full rounded-2xl border border-green-600">
                </div>

                <!-- ================= DETAILS ================= -->
                <div>

                    <h1 class="text-3xl font-bold text-green-500 mb-4">
                        {{ $product->product_name }}
                    </h1>

                    <p class="text-gray-300 mb-6">
                        {{ $product->description }}
                    </p>

                    <!-- ================= FORM ================= -->
                    <form method="POST" action="{{ route('basket.add') }}">
                        @csrf

                        <!-- VARIANT SELECT -->
                        <label class="block mb-2 font-semibold">Select Size</label>

                        <select id="variantSelect" name="variant_id"
                            class="w-full p-3 bg-black border border-green-500 rounded mb-4">

                            @foreach($product->variants as $variant)
                                <option 
                                    value="{{ $variant->id }}"
                                    data-price="{{ $variant->price }}"
                                    data-stock="{{ $variant->stock }}">

                                    {{ $variant->size }} - £{{ number_format($variant->price, 2) }}

                                </option>
                            @endforeach

                        </select>

                        <!-- PRICE -->
                        <p class="text-xl font-bold text-green-300 mb-2">
                            Price: £<span id="priceDisplay">--</span>
                        </p>

                        <!-- STOCK -->
                        <p id="stockDisplay" class="text-sm mb-4"></p>

                        <!-- QUANTITY -->
                        <label class="block mb-2 font-semibold">Quantity</label>

                        <select name="quantity"
                            class="w-full mb-4 p-2 bg-black border border-green-500 text-green-300 rounded">

                            @for($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor

                        </select>

                        <!-- BUTTON -->
                        <button id="addBtn"
                            class="bg-green-500 text-black px-6 py-3 rounded hover:bg-green-400 w-full">
                            Add to Basket
                        </button>

                    </form>

                </div>

            </div>

        </div>
    </div>

    <!-- ================= JS ================= -->
    <script>
        const select = document.getElementById('variantSelect');
        const priceDisplay = document.getElementById('priceDisplay');
        const stockDisplay = document.getElementById('stockDisplay');
        const addBtn = document.getElementById('addBtn');

        function updateVariantUI() {
            const selected = select.options[select.selectedIndex];

            const price = selected.getAttribute('data-price');
            const stock = selected.getAttribute('data-stock');

            // Update price
            priceDisplay.textContent = parseFloat(price).toFixed(2);

            const quantitySelect = document.querySelector('select[name="quantity"]');

            quantitySelect.innerHTML = "";

            let max = Math.min(stock, 10);

            for (let i = 1; i <= max; i++) {
                let option = document.createElement("option");
                option.value = i;
                option.textContent = i;
                quantitySelect.appendChild(option);
            }
            // Update stock + button state
            if (stock <= 0) {
                stockDisplay.textContent = "Out of stock";
                stockDisplay.className = "text-red-500 mb-4";
                addBtn.disabled = true;
                addBtn.classList.add("opacity-50");
            } else if (stock <= 10) {
                stockDisplay.textContent = "Low stock (" + stock + " left)";
                stockDisplay.className = "text-yellow-400 mb-4";
                addBtn.disabled = false;
                addBtn.classList.remove("opacity-50");
            } else {
                stockDisplay.textContent = "In stock (" + stock + ")";
                stockDisplay.className = "text-green-500 mb-4";
                addBtn.disabled = false;
                addBtn.classList.remove("opacity-50");
            }
        }

        // Init + change listener
        updateVariantUI();
        select.addEventListener('change', updateVariantUI);
    </script>

</x-layout>
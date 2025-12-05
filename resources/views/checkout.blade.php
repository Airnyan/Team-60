<x-layout>
    @vite('resources/css/basket.css')

    <x-slot:title>Checkout</x-slot:title>

    <div class="basket-page">

        <h1 class="basket-title">Checkout</h1>

        <div class="basket-container">

            <!-- LEFT SIDE — ORDER ITEMS -->
            <div class="basket-items">

                <h2 class="text-green-400 text-xl mb-4">Order Items</h2>

                @foreach ($products as $item)
                    <div class="basket-item-template">

                        <div class="item-image">
                            <img src="{{ asset('images/' . $item->product->image) }}" class="w-full h-full object-cover">
                        </div>

                        <div class="item-details">
                            <h3 class="item-name">{{ $item->product->product_name }}</h3>
                            <p class="item-size">Size: {{ $item->product->size }}</p>
                            <p class="item-price">Price: £{{ $item->product->price }}</p>

                            <div class="quantity-controls">
                                <span class="qty-number">x {{ $item->quantity }}</span>
                            </div>
                        </div>

                        <div class="item-total">
                            £{{ $item->product->price * $item->quantity }}
                        </div>

                    </div>
                @endforeach

            </div>



            <!-- RIGHT SIDE — SUMMARY + ADDRESS -->
            <div class="basket-summary">

                <h2>Order Summary</h2>

                <div class="summary-line">
                    <span>Items Total</span>
                    <span>£{{ $total }}</span>
                </div>

                <div class="summary-line">
                    <span>Shipping</span>
                    <span>£0.00</span>
                </div>

                <div class="summary-line total">
                    <span>Total</span>
                    <span>£{{ $total }}</span>
                </div>


                <!-- ADDRESS FORM -->
                <form class="address-form mt-4">
                    <h3 class="text-white">Shipping Address</h3>

                    <input type="text" placeholder="Full Name" required>
                    <input type="text" placeholder="Address Line 1" required>
                    <input type="text" placeholder="Address Line 2 (Optional)">
                    <input type="text" placeholder="City" required>
                    <input type="text" placeholder="Postcode / ZIP" required>
                    <input type="text" placeholder="Country" required>
                </form>

                <a href="/" class="checkout-btn mt-4 text-center block">
                    Place Order
                </a>

            </div>

        </div>

    </div>

</x-layout>

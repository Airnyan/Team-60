{{-- Checkout Page --}}
<x-layout>
    @vite('resources/css/basket.css')

    <x-slot:title>Checkout</x-slot:title>

    <div class="basket-page">

        <h1 class="basket-title">Order Placed Successfully</h1>

        <!-- Success Message -->
        <div class="bg-green-600 text-black p-4 rounded mb-6 font-bold text-lg">
            ✅ Thank you! Your order has been placed successfully.
        </div>

        <div class="basket-container">

            <!-- LEFT SIDE: Order Items -->
            <div class="basket-items">

                <h2 class="text-green-400 text-xl mb-4">Items in your order</h2>

                @foreach ($products as $item)
                    <div class="basket-item-template">

                        <div class="item-image">
                            <img src="{{ asset('images/' . $item->product->image) }}" 
                                 style="width:100%; height:100%; object-fit:cover;">
                        </div>

                        <div class="item-details">
                            <h3 class="item-name">{{ $item->product->name }}</h3>
                            <p class="item-size">Size: {{ $item->product->size }}</p>
                            <p class="item-quantity">Quantity: {{ $item->quantity }}</p>
                            <p class="item-price">Price: £{{ $item->product->price }}</p>
                        </div>

                        <div class="item-total">
                            £{{ $item->quantity * $item->product->price }}
                        </div>

                    </div>
                @endforeach

            </div>

            <!-- RIGHT SIDE: Summary -->
            <div class="basket-summary">

                <h2>Order Summary</h2>

                <div class="summary-line">
                    <span>Subtotal</span>
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

                <a href="/" class="checkout-btn" style="text-align:center; display:block;">
                    Return Home
                </a>

            </div>

        </div>
    </div>

</x-layout>

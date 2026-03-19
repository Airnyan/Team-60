{{-- Checkout Page --}}
<x-layout>
    @vite('resources/css/basket.css')

    <x-slot:title>Checkout</x-slot:title>
    <!--Content Wrapper-->
    <div class="container mx-auto px-4 pt-10">
    <div class="basket-page bg-black rounded-2xl">

        <h1 class="basket-title">Order Placed Successfully</h1>

        <!-- Success Message -->
        <div class="bg-green-600 text-black p-4 rounded mb-6 font-bold text-lg">
            ✅ Thank you! Your order has been placed successfully.
        </div>

        <div class="basket-container">

            <!-- LEFT SIDE: Order Items -->
            <div class="basket-items">

                <h2 class="text-green-400 text-xl mb-4">Items in your order</h2>

                @foreach($products as $product)
    <div class="checkout-item flex items-center mb-4">
        <div class="w-16 h-16 mr-4">
            @if($product->image)
                <img src="{{ asset($product->image) }}" class="rounded-lg object-cover">
            @else
                <div class="bg-gray-700 rounded-lg w-full h-full flex items-center justify-center text-xs">No Image</div>
            @endif
        </div>

        <div>
            <h4 class="font-bold text-white">{{ $product->name }}</h4>
            
            <p class="text-gray-400 text-sm">Qty: {{ $product->quantity }}</p>
            <p class="text-green-500">£{{ number_format($product->price, 2) }}</p>
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
    </div>
</x-layout>

{{-- 
    NOTE:
    You do not need to write any of the standard HTML code.
    It is already written in the views/components/layout.blade.php file.
    Just simply write your page content inside the <x-layout> tags.
--}}

<x-layout>
    <!--connection to the basket css file-->
    @vite('resources/css/basket.css')

    <!--title page-->
    <x-slot:title>
        Basket Page
    </x-slot:title>

    <!--Content Wrapper-->
    <div class="container mx-auto px-4 pt-10">
    <!-- basket page code -->
    <div class="basket-page bg-black rounded-2xl">

        <h1 class="basket-title">Your Basket</h1>

        <div class="basket-container">

        <!-- basket items (on the left) -->
        <div class="basket-items">
                {{-- Loops through each basket item --}}
                @foreach ($basket->basket_product as $basket_product)
                    
                    <!-- template item (Backend will duplicate this) -->
                    <!-- template is used to show the items in the basket -->
                    {{-- Linked basket items to template --}}
                    <div class="basket-item-template">
                        <div class="item-image"><img src="{{$basket_product->variant->product->image}}"></div>

                        <div class="item-details">
                        <h3 class="item-name">{{$basket_product->variant->product->product_name}}</h3>
                        <p class="item-size">Size: {{$basket_product->variant->size}}</p>
                        {{-- <p class="item-quantity">Quantity: {{$basket_product->quantity}}</p> --}}
                        <p class="item-price">Price: £{{$basket_product->variant->price}}</p>

                        <!-- Quantity controls -->
                            <div class="quantity-controls">
                                <form action="{{ route('basket.update', $basket_product->variant->id) }}" method="POST">
                                    @csrf
                                <button type="submit" name="change" value="-1" class="qty-btn minus">-</button>
                                </form>
                                <span class="qty-number">{{$basket_product->quantity}}</span>
                                <form action="{{ route('basket.update', $basket_product->variant->id) }}" method="POST">
                                    @csrf
                                <button type="submit" name="change" value="1" class="qty-btn plus">+</button>
                                </form>
                            </div>
                        </div>

                        <div class="item-total">
                            £{{($basket_product->quantity * $basket_product->variant->price)}}
                        </div>
                    </div>
                @endforeach
            </div>

        <!-- checkout summary -->
        <div class="basket-summary">

            <h2>Order Summary</h2>

            <div class="summary-line">
                <span>Subtotal</span>
                <span id="subtotal">£0.00</span>
            </div>

            <div class="summary-line">
                <span>Shipping</span>
                <span id="shipping">£0.00</span>
            </div>

            <div class="summary-line total">
                <span>Total</span>
                <span id="total">£0.00</span>
            </div>
            <h3>Shipping Address</h3>
            <form action="{{ route('basket.checkout') }}" method="POST">
                @csrf

                    <input type="text" name="address1" placeholder="Address Line 1" value="{{ old('address1')}}" required>
                    <input type="text" name="address2" placeholder="Address Line 2" value="{{ old('address2')}}"required>
                    <input type="text" name="postcode" placeholder="Postcode / ZIP" value="{{ old('postcode')}}"required>
                <button class="checkout-btn" type = "submit">Checkout</button>
            </form>
        </div>

        </div>

    </div>
    </div>
</x-layout>

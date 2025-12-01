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


    <!-- basket page code -->
    <div class="basket-page">

        <h1 class="basket-title">Your Basket</h1>

        <div class="basket-container">

        <!-- basket items (on the left) -->
        <div class="basket-items">

            <!-- template item (Backend will duplicate this) -->
             <!-- template is used to show the items in the basket -->
            <div class="basket-item-template">
                <div class="item-image"></div>

                <div class="item-details">
                <h3 class="item-name">Product Name (Template)</h3>
                <p class="item-size">Size: --</p>
                <p class="item-quantity">Quantity: --</p>
                <p class="item-price">£0.00</p>
                </div>
            </div>

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

            <button class="checkout-btn">Checkout</button>

        </div>

        </div>

    </div>

</x-layout>

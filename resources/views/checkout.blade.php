<x-layout>
    <x-slot:title>
        Checkout
    </x-slot:title>

    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-8">

        <h1 class="text-3xl font-bold mb-6 text-center">Checkout</h1>

        <!-- Order placed message -->
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            <p class="font-semibold">Thanks for placing your order!</p>
            <p>Your order details are shown below.</p>
        </div>

        <!-- Order Summary Section -->
        <div class="mb-8">
            <h2 class="text-2xl font-semibold mb-4">Order Summary</h2>

            <div class="bg-gray-100 p-4 rounded-lg">

                <div class="flex justify-between py-2 border-b">
                    <span class="font-medium">Items Total:</span>
                    <span>£0.00</span>
                </div>

                <div class="flex justify-between py-2 border-b">
                    <span class="font-medium">Shipping:</span>
                    <span>£0.00</span>
                </div>

                <div class="flex justify-between py-3 text-xl font-bold">
                    <span>Total:</span>
                    <span>£0.00</span>
                </div>

            </div>
        </div>

        <!-- Shipping address (static dummy for now) -->
        <div class="mb-8">
            <h2 class="text-2xl font-semibold mb-3">Shipping Address</h2>

            <div class="bg-gray-100 p-4 rounded-lg">
                <p class="font-medium">John Doe</p>
                <p>123 Example Street</p>
                <p>Birmingham</p>
                <p>B1 2AB</p>
                <p>United Kingdom</p>
            </div>
        </div>

        <!-- Confirmation message -->
        <div class="text-center">
            <a href="/" class="btn btn-primary text-white w-full md:w-1/2">
                Return to Home
            </a>
        </div>

    </div>
</x-layout>
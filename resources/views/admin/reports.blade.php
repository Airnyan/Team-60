<x-layout>
    <x-slot:title>
        Reports
    </x-slot:title>



    <!--Content Wrapper-->
    <div class="container mx-auto px-4 pt-10"> 

    <div class="container mx-auto bg-base-300 rounded-4xl"> 

            <!-- name of each tab group should be unique -->
            <div class="tabs tabs-lift">
                <input type="radio" name="my_tabs_6" class="tab" aria-label="Stock Level"  checked="checked"/>
                <div class="tab-content bg-base-100 border-base-300 p-4">
                    <!-- Report Table -->
                    <div class="overflow-x-auto bg-base-300 h-[500px] border border-base-300 shadow-sm rounded-2xl px-5">
                        <table class="table">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>

                                <!-- row 1 -->
                                @foreach($variants as $variant)
                                <tr>
                                    <td>{{ $variant->id}}</td>
                                    <td>{{ $variant->product->product_name }}</td>
                                    <td>{{ $variant->stock }}</td>
                                    <td>{{ $variant->size }}</td>
                                    <td>{{ $variant->price }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Order Tab -->
                <input type="radio" name="my_tabs_6" class="tab" aria-label="Order Table" />
                <div class="tab-content bg-base-100 border-base-300 p-4">
                    <!-- Order Table -->
                    <div class="overflow-x-auto bg-base-300 h-[500px] border border-base-300 shadow-sm rounded-2xl px-5">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order Number</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->status }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>



            </div>
        </div>


















</x-layout>
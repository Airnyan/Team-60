<x-layout>
    <x-slot:title>
        Reports
    </x-slot:title>



    <!--Content Wrapper-->
    <div class="container mx-auto px-4 pt-10"> 

        <!--Heading-->
        <div class="hover-3d"> 
            <div class="mb-4 mt-4 inline-flex items-center justify-center rounded-3xl bg-base-300 h-16 px-2">
                <h3 class="text-2xl text-neutral-content font-semibold">Report Table</h3>
            </div>
        </div>
        <!-- Report Table -->
        <div class="overflow-x-auto bg-base-300 h-100 border border-base-300 shadow-sm mb-10 rounded-2xl px-5">
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

        


        <!--Heading-->
        <div class="hover-3d"> 
            <div class="mb-4 mt-4 inline-flex items-center justify-center rounded-3xl bg-base-300 h-16 px-2">
                <h3 class="text-2xl text-neutral-content font-semibold">Order Table</h3>
            </div>
        </div>
        <!-- Order Table -->
        <div class="overflow-x-auto bg-base-300 h-100 border border-base-300 shadow-sm rounded-2xl mb-10">
            
        
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





</x-layout>
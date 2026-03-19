<x-layout>

<div class="container mx-auto py-10 text-white">

    <h1 class="text-3xl font-bold mb-6 text-green-400">My Orders</h1>

    @if(session('success'))
        <div class="bg-green-600 text-white px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-600 text-white px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @forelse($orders as $order)
        <div class="border border-green-500 rounded-lg p-4 mb-4 bg-black">

            <div class="flex justify-between mb-2">
                <div>
                    <p class="font-semibold">Order #{{ $order->id }}</p>
                    <p class="text-sm text-gray-400">{{ $order->created_at }}</p>
                </div>

                <div class="text-green-300 font-bold">
                    Status: {{ $order->status }}
                </div>
            </div>

            <div class="mt-3">
                <p class="font-semibold mb-2">Items:</p>

                <ul class="list-disc pl-6">
                    @foreach($order->products as $line)
                        <li>
                            {{ $line->variant->product->product_name ?? ($line->product->product_name ?? 'Product') }}
                            @if(isset($line->variant) && $line->variant->size)
                                (Size: {{ $line->variant->size }})
                            @endif
                            (Qty: {{ $line->quantity ?? 1 }})
                        </li>
                    @endforeach
                </ul>
            </div>

            @if($order->status === 'Fulfilled' || $order->status === 'Fufilled')
                <div class="mt-4">
                    <form action="{{ route('orders.return', $order) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded font-semibold">
                            Return Product
                        </button>
                    </form>
                </div>
            @elseif($order->status === 'Cancelled')
                <div class="mt-4">
                    <span class="bg-yellow-500 text-black px-4 py-2 rounded font-semibold">
                        Returned / Cancelled
                    </span>
                </div>
            @endif

        </div>
    @empty
        <p class="text-xl">You have no orders yet.</p>
    @endforelse

</div>

</x-layout>
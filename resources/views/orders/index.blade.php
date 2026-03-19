<x-layout>

<div class="container mx-auto py-10 text-white">

<h1 class="text-3xl font-bold mb-6 text-green-400">My Orders</h1>

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
{{ $line->variant->product->product_name }}
(Size: {{ $line->variant->size }})
(Qty: {{ $line->quantity }})
</li>
@endforeach

</ul>
</div>

</div>

@empty

<p class="text-xl">You have no orders yet.</p>

@endforelse

</div>

</x-components.layout>
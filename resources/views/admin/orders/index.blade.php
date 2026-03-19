<x-layout>

<div class="container mx-auto py-10 text-white">

<h1 class="text-3xl font-bold mb-6 text-green-400">Manage Orders</h1>

@forelse($orders as $order)

<div class="border border-green-500 rounded-lg p-4 mb-4 bg-black">

<div class="flex justify-between mb-2">

<div>
<p class="font-semibold">Order #{{ $order->id }}</p>

<p class="text-sm text-gray-400">
Customer: {{ $order->user->name ?? 'Unknown User' }}
</p>

<p class="text-sm text-gray-400">
{{ $order->created_at }}
</p>
</div>

<div class="text-green-300 font-bold">
Current Status: {{ $order->status }}
</div>

</div>

<div class="mb-3">
<p class="font-semibold mb-1">Items:</p>

<ul class="list-disc pl-6">

@foreach($order->products as $line)

<li>
{{ $line->product->product_name ?? 'Product' }}
(Qty: {{ $line->quantity ?? 1 }})
</li>

@endforeach

</ul>
</div>

<form method="POST" action="{{ route('admin.orders.status', $order) }}">
@csrf

<div class="flex items-center gap-4">

<select name="status" class="bg-white text-black p-2 rounded">

<option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
<option value="Awaiting Payment" {{ $order->status == 'Awaiting Payment' ? 'selected' : '' }}>Awaiting Payment</option>
<option value="Fufilled" {{ $order->status == 'Fufilled' ? 'selected' : '' }}>Fufilled</option>
<option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>

</select>

<button
type="submit"
class="bg-green-500 px-3 py-1 rounded text-black font-semibold">
Update
</button>

</div>

</form>

</div>

@empty

<p class="text-xl">No orders found.</p>

@endforelse

</div>

</x-layout>
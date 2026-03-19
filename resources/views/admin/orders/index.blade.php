<x-layout>

<div class="container mx-auto py-10 text-white">

<h1 class="text-3xl font-bold mb-6 text-green-400">Manage Orders</h1>

@if(session('success'))
<div class="bg-green-500 text-black p-3 rounded mb-4">
    {{ session('success') }}
</div>
@endif

@forelse($orders as $order)

<div class="border border-green-500 rounded-lg p-4 mb-6 bg-black">

<div class="flex justify-between items-start mb-3">

<div>
<p class="font-semibold text-lg">
Order #{{ $order->id }}
</p>

<p class="text-sm text-gray-400">
Customer: {{ $order->user->name ?? 'Unknown User' }}
</p>

<p class="text-sm text-gray-400">
{{ $order->created_at->format('d M Y H:i') }}
</p>
</div>

<div class="font-bold
@if($order->status == 'Pending') text-yellow-400
@elseif($order->status == 'Awaiting Payment') text-orange-400
@elseif($order->status == 'Fulfilled') text-green-400
@elseif($order->status == 'Cancelled') text-red-400
@endif
">
Status: {{ $order->status }}
</div>

</div>

<div class="mb-4">
<p class="font-semibold mb-1">Items:</p>

<ul class="list-disc pl-6">

@foreach($order->products as $line)

<li>
{{ $line->variant->product->product_name ?? 'Product' }}
(Size: {{ $line->variant->size ?? '-' }})
(Qty: {{ $line->quantity ?? 1 }})
</li>

@endforeach

</ul>
</div>

<form method="POST" action="{{ route('admin.orders.status', $order) }}">
@csrf

<div class="flex items-center gap-4">

<select name="status" class="bg-white text-black p-2 rounded">

<<<<<<< HEAD
<option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
<option value="Awaiting Payment" {{ $order->status == 'Awaiting Payment' ? 'selected' : '' }}>Awaiting Payment</option>
<option value="Fufilled" {{ $order->status == 'Fufilled' ? 'selected' : '' }}>Fufilled</option>
<option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
=======
<option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>
Pending
</option>

<option value="Awaiting Payment" {{ $order->status == 'Awaiting Payment' ? 'selected' : '' }}>
Awaiting Payment
</option>

<option value="Fufilled" {{ $order->status == 'Fufilled' ? 'selected' : '' }}>
Fulfilled
</option>

<option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>
Cancelled
</option>
>>>>>>> develop

</select>

<button
type="submit"
class="bg-green-500 px-4 py-2 rounded text-black font-semibold hover:bg-green-400">
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
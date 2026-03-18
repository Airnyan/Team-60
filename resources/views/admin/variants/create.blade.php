<x-layout>

<h1>Add Variant for {{ $product->product_name }}</h1>

<form method="POST" action="{{ route('admin.variants.store', $product) }}">
@csrf

<input type="text" name="size" placeholder="Size" required>
<input type="number" name="price" placeholder="Price" required>
<input type="number" name="stock" placeholder="Stock" required>

<button>Add Variant</button>

</form>

</x-layout>
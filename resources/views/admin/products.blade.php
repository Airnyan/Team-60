<x-layout>

<h1 class="text-2xl mb-4 text-green-400">Manage Products</h1>

<a href="{{ route('admin.products.create') }}" class="bg-green-500 px-4 py-2 rounded">
    + Add Product
</a>

<table class="w-full mt-6 border border-green-500">

@foreach($products as $product)

@php
    $totalStock = $product->variants->sum('stock');
    $reserved = $product->variants->sum('reserved_stock');
@endphp

<tr class="bg-black border-b border-green-500">
    <td>{{ $product->product_name }}</td>
    <td>Total: {{ $totalStock }}</td>
    <td>Reserved: {{ $reserved }}</td>

    <td>
        <a href="{{ route('admin.products.edit', $product) }}">Edit</a>

        <form method="POST" action="{{ route('admin.products.destroy', $product) }}">
            @csrf
            @method('DELETE')
            <button>Delete</button>
        </form>

        <a href="{{ route('admin.variants.create', $product) }}">
            + Variant
        </a>
    </td>
</tr>

{{-- VARIANTS --}}
@foreach($product->variants as $variant)

<tr class="bg-gray-900 text-sm">
    <td class="pl-6">
        {{ $variant->size }}
    </td>

    <td>Stock: {{ $variant->stock }}</td>
    <td>Reserved: {{ $variant->reserved_stock }}</td>
    <td>£{{ $variant->price }}</td>

    <td>
        <form method="POST" action="{{ route('admin.variants.destroy', $variant) }}">
            @csrf
            @method('DELETE')
            <button class="text-red-500">Delete</button>
        </form>
    </td>
</tr>

@endforeach

@endforeach

</table>

</x-layout>
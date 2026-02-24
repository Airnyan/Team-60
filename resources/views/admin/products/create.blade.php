<x-layout>
<x-slot:title>Create Product</x-slot:title>

<div class="container mx-auto py-10 text-white max-w-xl">

    <h1 class="text-3xl font-bold text-green-400 mb-6">
        Create Product
    </h1>

    <form method="POST"
          action="{{ route('admin.products.store') }}"
          enctype="multipart/form-data"
          class="space-y-4">
        @csrf

        <label class="block">
            <span class="text-green-400">Product Name</span>
            <input type="text" name="product_name"
                class="w-full px-4 py-2 bg-black border border-green-500 text-green-300 rounded">
        </label>

        <label class="block">
            <span class="text-green-400">Description</span>
            <textarea name="description"
                class="w-full px-4 py-2 bg-black border border-green-500 text-green-300 rounded"
                rows="4"></textarea>
        </label>

        <label class="block">
            <span class="text-green-400">Price</span>
            <input type="number" step="0.01" name="price"
                class="w-full px-4 py-2 bg-black border border-green-500 text-green-300 rounded">
        </label>

        <label class="block">
            <span class="text-green-400">Discounted Price</span>
            <input type="number" step="0.01" name="discounted_price"
                class="w-full px-4 py-2 bg-black border border-green-500 text-green-300 rounded">
        </label>

        <label class="block">
            <span class="text-green-400">Current Stock</span>
            <input type="number" name="current_stock"
                class="w-full px-4 py-2 bg-black border border-green-500 text-green-300 rounded">
        </label>

        <label class="block">
            <span class="text-green-400">Size</span>
            <input type="text" name="size"
                class="w-full px-4 py-2 bg-black border border-green-500 text-green-300 rounded">
        </label>

        <label class="block text-green-400 font-semibold mb-2">
            Product Type
        </label>

        <div class="space-y-2 text-green-300">

            <label class="flex items-center gap-2">
                <input type="radio" name="product_type_id" value="1" required>
                T-Shirt
            </label>

            <label class="flex items-center gap-2">
                <input type="radio" name="product_type_id" value="2">
                Hoodie
            </label>

            <label class="flex items-center gap-2">
                <input type="radio" name="product_type_id" value="3">
                Tracksuit
            </label>

            <label class="flex items-center gap-2">
                <input type="radio" name="product_type_id" value="4">
                Hat
            </label>

            <label class="flex items-center gap-2">
                <input type="radio" name="product_type_id" value="5">
                Poster
            </label>

        </div>



        <label class="block">
            <span class="text-green-400">Image</span>
            <input type="file" name="image"
                class="w-full px-4 py-2 bg-black border border-green-500 text-green-300 rounded">
        </label>

        <button class="w-full bg-green-500 hover:bg-green-600 text-black font-bold py-2 rounded">
            Create Product
        </button>

    </form>

</div>
</x-layout>
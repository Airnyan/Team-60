<x-layout>
    <x-slot:title>Edit Product</x-slot:title>

    <div class="container mx-auto py-10 text-white max-w-xl">

        <h1 class="text-3xl font-bold text-green-400 mb-6">
            Edit Product
        </h1>

        <form method="POST"
              action="{{ route('admin.products.update', $product) }}"
              class="space-y-5" enctype="multipart/form-data"> 
              
              

            @csrf
            @method('PUT')

            {{-- Product Name --}}
            <div>
                <label class="block text-green-400 mb-1 font-semibold">
                    Product Name
                </label>
                <input type="text"
                       name="product_name"
                       value="{{ old('product_name', $product->product_name) }}"
                       class="w-full px-4 py-2 bg-black border border-green-500 text-green-300 rounded">
            </div>

            {{-- Product Type --}}
            <label class="block text-green-400 font-semibold mb-2">
                Product Type
            </label>

            <div class="space-y-2 text-green-300">

                <label class="flex items-center gap-2">
                    <input type="radio"
                        name="product_type_id"
                        value="1"
                        {{ old('product_type_id', $product->product_type_id) == 1 ? 'checked' : '' }}>
                    T-Shirt
                </label>

                <label class="flex items-center gap-2">
                    <input type="radio"
                        name="product_type_id"
                        value="2"
                        {{ old('product_type_id', $product->product_type_id) == 2 ? 'checked' : '' }}>
                    Hoodie
                </label>

                <label class="flex items-center gap-2">
                    <input type="radio"
                        name="product_type_id"
                        value="3"
                        {{ old('product_type_id', $product->product_type_id) == 3 ? 'checked' : '' }}>
                    Tracksuit
                </label>

                <label class="flex items-center gap-2">
                    <input type="radio"
                        name="product_type_id"
                        value="4"
                        {{ old('product_type_id', $product->product_type_id) == 4 ? 'checked' : '' }}>
                    Hat
                </label>

                <label class="flex items-center gap-2">
                    <input type="radio"
                        name="product_type_id"
                        value="5"
                        {{ old('product_type_id', $product->product_type_id) == 5 ? 'checked' : '' }}>
                    Poster
                </label>

            </div>

            @error('product_type_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror


            {{-- Description --}}
            <div>
                <label class="block text-green-400 mb-1 font-semibold">
                    Description
                </label>
                <textarea name="description"
                          rows="4"
                          class="w-full px-4 py-2 bg-black border border-green-500 text-green-300 rounded">{{ old('description', $product->description) }}</textarea>
            </div>

            {{-- Price --}}
            <div>
                <label class="block text-green-400 mb-1 font-semibold">
                    Price
                </label>
                <input type="number"
                       step="0.01"
                       name="price"
                       value="{{ old('price', $product->price) }}"
                       class="w-full px-4 py-2 bg-black border border-green-500 text-green-300 rounded">
            </div>

            {{-- Discounted Price --}}
            <div>
                <label class="block text-green-400 mb-1 font-semibold">
                    Discounted Price
                </label>
                <input type="number"
                       step="0.01"
                       name="discounted_price"
                       value="{{ old('discounted_price', $product->discounted_price) }}"
                       class="w-full px-4 py-2 bg-black border border-green-500 text-green-300 rounded">
            </div>

            {{-- Stock --}}
            <div>
                <label class="block text-green-400 mb-1 font-semibold">
                    Current Stock
                </label>
                <input type="number"
                       name="current_stock"
                       value="{{ old('current_stock', $product->current_stock) }}"
                       class="w-full px-4 py-2 bg-black border border-green-500 text-green-300 rounded">
            </div>

            {{-- Size --}}
            <div>
                <label class="block text-green-400 mb-1 font-semibold">
                    Size
                </label>
                <input type="text"
                       name="size"
                       value="{{ old('size', $product->size) }}"
                       class="w-full px-4 py-2 bg-black border border-green-500 text-green-300 rounded">
            </div>
                {{-- -Upload New Image --}}
                <div>
                    <label class="block text-green-400 mb-1 font-semibold">
                        Upload New Image
                    </label>
                    <input type="file"
                           name="image"
                           class="w-full px-4 py-2 bg-black border border-green-500 text-green-300 rounded">

                           @if ($product -> image)
                           <img src = "{{ asset( $product->image) }}"
                                class="mt-4 h-32 rounded border border-green-500">
                           
                           @endif
                </div>
            <button class="w-full bg-green-500 hover:bg-green-600 text-black font-bold py-2 rounded">
                Update Product
            </button>

        </form>
    </div>
</x-layout>

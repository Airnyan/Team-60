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
            <div>
                <label class="block text-green-400 mb-1 font-semibold">
                    Product Type
                </label>

                <select name="product_type_id"
                    class="w-full px-4 py-2 bg-black border border-green-500 text-green-300 rounded">

                    @foreach($types as $type)

                        <option value="{{ $type->id }}"
                            {{ old('product_type_id', $product->product_type_id) == $type->id ? 'selected' : '' }}>

                            {{ $type->type_name }}

                        </option>

                    @endforeach

                </select>
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

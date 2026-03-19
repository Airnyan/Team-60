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
       

        <div class="space-y-2 text-green-300">

            <label class="block">
                <span class="text-green-400 font-semibold mb-2 block">
                    Product Type
                </span>

                <select name="product_type_id" required 
                    class="w-full px-4 py-2 bg-black border border-green-500 text-green-300 rounded">
                    <option value="">-- Select Product Type --</option>

                    @foreach($types as $type)
                        <option value="{{ $type->id }}">
                            {{ $type->type_name }}
                        </option>
                    @endforeach
                </select>
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
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductType;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function create()
    {
        $types = ProductType::all();
        return view('admin.products.create', compact('types'));

    }
    public function edit(Product $product)
    {
    $types = ProductType::all();

    return view('admin.products.edit', compact('product','types'));
    }

    public function destroy(Product $product)
    {
        $product->basket_product()->delete();    

        $product->delete();

        return redirect()
            ->route('admin.products')
            ->with('success', 'Product deleted successfully');
    }

    public function update(Request $request, Product $product)
{
    $validated = $request->validate([
        'product_name'      => 'required|string',
        'description'       => 'nullable|string',
        'price'             => 'required|numeric',
        'discounted_price'  => 'nullable|numeric',
        'current_stock'     => 'required|integer',
        'size'              => 'nullable|string',
        'product_type_id'   => 'required|exists:product_types,id',
        'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    if ($request->hasFile('image')) {

        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        $file = $request->file('image');
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('images/items'), $filename);

        $validated['image'] = 'images/items/' . $filename;
    }

    $product->update($validated);

    return redirect()
        ->route('admin.products')
        ->with('success', 'Product updated successfully');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'product_name'      => 'required|string',
        'description'       => 'nullable|string',
        'price'             => 'required|numeric',
        'discounted_price'  => 'nullable|numeric',
        'current_stock'     => 'required|integer',
        'size'              => 'nullable|string',
        'product_type_id'   => 'required|exists:product_types,id',
        'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    
    if ($request->hasFile('image')) {
        $imageName = time() . '_' . $request->image->getClientOriginalName();
        $request->image->move(public_path('images/items'), $imageName);
        $validated['image'] =  'images/items/' . $imageName;
    }

    Product::create($validated);

    return redirect()
        ->route('admin.products')
        ->with('success', 'Product created successfully');
}
}
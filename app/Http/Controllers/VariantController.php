<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    public function create(Product $product)
    {
        return view('admin.variants.create', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        ProductVariant::create([
            'product_id' => $product->id,
            'variant_name' => $product->product_name . ' - ' . $request->size,
            'size' => $request->size,
            'price' => $request->price,
            'discounted_price' => $request->discounted_price,
            'stock' => $request->stock,
            'reserved_stock' => 0,
        ]);

        return redirect()->route('admin.products');
    }

    public function edit(ProductVariant $variant)
    {
        return view('admin.variants.edit', compact('variant'));
    }
    public function update(Request $request, ProductVariant $variant)
    {
        $variant->update([
            'size' => $request->size,
            'price' => $request->price,
            'discounted_price' => $request->discounted_price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('admin.products');
    }
    public function destroy(ProductVariant $variant)
    {
        $variant->delete();

        return back();
    }
}
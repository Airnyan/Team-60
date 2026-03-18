<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;

class ProductController extends Controller
{
    // ================= SHOP =================
    public function index(Request $request)
    {
        $products = Product::with('variants')->get();

        return view('shop', compact('products'));
    }

    // ================= PRODUCT PAGE =================
    public function show($id)
    {
        $product = Product::with('variants')->findOrFail($id);

        return view('product.show', compact('product'));
    }

    // ================= ADMIN LIST =================
    public function adminIndex()
    {
        $products = Product::with('variants')->get();

        return view('admin.products', compact('products'));
    }

    // ================= CREATE PRODUCT =================
    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        Product::create([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'image' => $request->image,
        ]);

        return redirect()->route('admin.products');
    }

    // ================= EDIT PRODUCT =================
    public function edit(Product $product)
    {
        $product->load('variants');

        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'image' => $request->image,
        ]);

        return back();
    }

    // ================= DELETE PRODUCT =================
    public function destroy(Product $product)
    {
        $product->variants()->delete();
        $product->delete();

        return back();
    }
}
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
    $query = Product::with('variants');

    // 🔥 CATEGORY FILTER
    if ($request->category) {
        $query->where('product_type_id', $request->category);
    }

    // (optional) search
    if ($request->search) {
        $query->where('product_name', 'LIKE', '%' . $request->search . '%');
    }

    $products = $query->get();

    return view('products', compact('products'));
}

    // ================= PRODUCT PAGE =================
    public function show($id)
    {
        $product = Product::with('variants')->findOrFail($id);

        return view('product.show', compact('product'));
    }

    // ================= ADMIN LIST =================
    public function adminIndex(Request $request)
    {
        $query = Product::with('variants');

        if ($request->search) {
            $query->where('product_name', 'LIKE', '%' . $request->search . '%');
        }

        $products = $query->get();

        if ($request->stock_filter) {
            $products = $products->filter(function ($product) use ($request) {
                $totalStock = $product->variants->sum('stock');

                return match ($request->stock_filter) {
                    'in_stock' => $totalStock > 10,
                    'low_stock' => $totalStock > 0 && $totalStock <= 10,
                    'out_of_stock' => $totalStock <= 0,
                    default => true,
                };
            });
        }

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
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
        $categories = ProductType::orderBy('id')->get();

        $query = Product::with([
            'variants' => function ($query) {
                $query->orderBy('id');
            },
            'product_type',
        ]);

        if ($request->filled('category')) {
            $query->where('product_type_id', $request->category);
        }

        if ($request->filled('search')) {
            $query->where('product_name', 'LIKE', '%' . $request->search . '%');
        }

        $products = $query->get();

        return view('products', compact('products', 'categories'));
    }

    
    public function show(Product $product)
    {
        $product->load([
            'variants' => function ($query) {
                $query->orderBy('id');
            },
            'product_type',
        ]);

        $defaultVariant = $product->variants->firstWhere('stock', '>', 0) ?? $product->variants->first();

        return view('product.show', compact('product', 'defaultVariant'));
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
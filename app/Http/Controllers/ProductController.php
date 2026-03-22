<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\Review; // 1. Added the Review model import
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // 2. Added Auth import for the store method

class ProductController extends Controller
{
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

    // 3. AMENDED SHOW METHOD
    public function show(Product $product)
    {
        $product->load([
            'variants' => function ($query) {
                $query->orderBy('id');
            },
            'product_type',
        ]);

        // Fetch reviews for this specific product to fix the "Undefined variable $reviews" error
        $reviews = Review::where('product_id', $product->id)
            ->with('user') // This allows you to show the name of the reviewer
            ->latest()
            ->get();

        $defaultVariant = $product->variants->firstWhere('stock', '>', 0) ?? $product->variants->first();

        // Added 'reviews' to the compact array
        return view('product.show', compact('product', 'defaultVariant', 'reviews'));
    }

    // 4. ADDED STORE METHOD (Copied logic from ReviewController)
    public function storeReview(Request $request)
    {
        $request->validate([
            'review' => 'required|min:5',
            'rating' => 'required|integer|min:1|max:5',
            'product_id' => 'required|exists:products,id'
        ]);

        Review::create([
            'product_id' => $request->input('product_id'),
            'user_id'    => Auth::id(),
            'review'     => $request->input('review'),
            'rating'     => $request->input('rating'),
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }

    // ... keeping the rest of your admin methods below ...

    public function adminIndex()
    {
        $products = Product::with(['variants', 'product_type'])->get();
        return view('admin.products', compact('products'));
    }

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

    public function edit(Product $product)
    {
        $product->load(['variants', 'product_type']);
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

    public function destroy(Product $product)
    {
        $product->variants()->delete();
        $product->delete();
        return back();
    }
}
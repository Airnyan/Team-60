<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Public products page (shop search)
    public function index(Request $request)
    {
        $search = $request->input('search');

        $products = Product::when($search, function ($q) use ($search) {
            return $q->where('product_name', 'LIKE', "%{$search}%")
                     ->orWhere('description', 'LIKE', "%{$search}%");
                     
        })->get();

        return view('products', [
            'products' => $products,
            'search' => $search,
        ]);
    }

    // Admin product list + search
    public function adminIndex(Request $request)
    {
        $search = $request->input('search');

        $products = Product::when($search, function ($q) use ($search) {
            return $q->where('product_name', 'LIKE', "%{$search}%")
                     ->orWhere('description', 'LIKE', "%{$search}%");
                     
        })->get();

        return view('admin.products', [
            'products' => $products,
            'search' => $search,
        ]);
    }

    public function show() {
        $products = Product::all();
        return view('shop', compact('products'));
    }



    // Homepage Items
    function homepage(){

        //Stores data in this variable    
        $homepage = Product::all();

        return view('index', compact('homepage'));
    
    }


}




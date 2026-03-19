<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Order; // Add this line!
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $lowStock = ProductVariant::lowStock(7)->get();

        return view('admin.dashboard', compact('lowStock'));
    }
    //

    // Method to fetch data and generate reports 
    public function reports()
    {
        $variants = ProductVariant::with('product')->get();    
        $orders = \App\Models\Order::with('user')->latest()->get();
        return view('admin.reports', compact('variants', 'orders'));
    }
}

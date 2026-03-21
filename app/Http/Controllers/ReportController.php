<?php

namespace App\Http\Controllers;

use App\Models\ProductVariant;
use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $products = ProductVariant::all();
        $orders = Order::whereIn('status', ['Pending', 'Shipped'])->get();

        return view('admin.reports', compact('products', 'orders'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $lowStock = ProductVariant::lowStock(7)->get();

        return view('admin.dashboard', compact('lowStock'));
    }
    //
}

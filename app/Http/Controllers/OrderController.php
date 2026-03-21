<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // USER: Order History / Status
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
            ->with(['products.product'])
            ->orderByDesc('order_date')
            ->get();

        return view('orders.index', compact('orders'));
    }

    // ADMIN: View all orders
    public function adminIndex()
    {
        $orders = Order::with(['user', 'products.product'])
            ->orderByDesc('order_date')
            ->get();

        return view('admin.orders.index', compact('orders'));
    }

    // ADMIN: Update order status
    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:Pending,Processing,Shipped,Delivered,Cancelled,Returned'],
        ]);

        $order->status = $validated['status'];
        $order->save();

        return back()->with('success', 'Order status updated.');
    }
}
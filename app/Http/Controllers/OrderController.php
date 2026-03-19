<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // USER: Order History / Status
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with(['products.variant.product'])
            ->orderByDesc('order_date')
            ->get();

        return view('orders.index', compact('orders'));
    }

    // USER: Request return for an order
    public function returnProduct(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            return back()->with('error', 'Unauthorized action.');
        }

       if ($order->status !== 'Fufilled') {
    return back()->with('error', 'Only fulfilled orders can be returned.');
}

        $order->status = 'Cancelled';
        $order->save();

        return back()->with('success', 'Return request submitted successfully.');
    }

    // ADMIN: View all orders
    public function adminIndex()
    {
        $orders = Order::with(['user', 'products.variant.product'])
            ->orderByDesc('order_date')
            ->get();

        return view('admin.orders.index', compact('orders'));
    }

    // ADMIN: Update order status
    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:Pending,Awaiting Payment,Fufilled,Cancelled'],
        ]);

        $order->status = $validated['status'];
        $order->save();

        return back()->with('success', 'Order status updated successfully.');
    }
}
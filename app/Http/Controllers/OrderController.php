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
    $request->validate([
        'status' => 'required|in:Pending,Shipped,Delivered,Cancelled,Returned',
    ]);

    switch ($request->status) {
        case 'Pending':
            $order->status = 'Pending';
            break;

        case 'Shipped':
            $order->status = 'Shipped';

            foreach ($order->products as $orderProduct) {
                $product = $orderProduct->product;

                if ($product) {
                    $product->reserved_stock = max(0, $product->reserved_stock - $orderProduct->quantity);
                    $product->save();
                }
            }
            break;

        case 'Delivered':
            $order->status = 'Delivered';
            break;

        case 'Cancelled':
            $order->status = 'Cancelled';

            foreach ($order->products as $orderProduct) {
                $product = $orderProduct->product;

                if ($product) {
                    $product->reserved_stock += $orderProduct->quantity;
                    $product->save();
                }
            }
            break;

        case 'Returned':
            $order->status = 'Returned';

            foreach ($order->products as $orderProduct) {
                $product = $orderProduct->product;

                if ($product) {
                    $product->stock += $orderProduct->quantity;
                    $product->save();
                }
            }
            break;
    }

    $order->save();

    return redirect()->back()->with('success', 'Order status updated successfully.');
}
}
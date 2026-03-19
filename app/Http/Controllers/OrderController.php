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
            'status' => ['required', 'in:Pending,Shipped,Delivered,Cancelled,Returned'],
        ]);

        if($order->status === $validated['status']) {
            return back()->with('info', 'Order status is already ' . $validated['status'] . '.');
        }
        
        switch($validated['status']){
            case 'Pending':
                $order->status = 'Pending';
                foreach($order->products as $orderProduct){
                    $product = $orderProduct->product;
                    $product->stock -= $orderProduct->quantity;
                    $product->reserved_stock += $orderProduct->quantity;
                    $product->save();
                }
                break;
            case 'Shipped':
                $order->status = 'Shipped';
                foreach($order->products as $orderProduct){
                    $product = $orderProduct->product;
                    $product->reserved_stock -= $orderProduct->quantity;
                    $product->save();
                }
                break;
            case 'Delivered':
                $order->status = 'Delivered';
                break;
            case 'Cancelled':
                $order->status = 'Cancelled';

                foreach($order->products as $orderProduct){
                    $product = $orderProduct->product;
                    $product->stock += $orderProduct->quantity;
                    $product->save();
                }
                break;
            case 'Returned':
                $order->status = 'Returned';
                break;
        }
        $order->save();

        return back()->with('success', 'Order status updated.');
    }
}
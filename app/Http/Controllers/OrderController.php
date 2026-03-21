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
        if ($order->user_id !== Auth::id()) {
            return back()->with('error', 'Unauthorized action.');
        }

        if ($order->status !== 'Delivered') {
            return back()->with('error', 'Only delivered orders can be returned.');
        }

        $order->status = 'Returned';

        foreach ($order->products as $orderProduct) {
            $variant = $orderProduct->variant;

            if ($variant) {
                $variant->stock += $orderProduct->quantity;
                $variant->save();
            }
        }

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
            'status' => ['required', 'in:Pending,Shipped,Delivered,Cancelled,Returned'],
        ]);

        if ($order->status === $validated['status']) {
            return back()->with('info', 'Order status is already ' . $validated['status'] . '.');
        }

        switch ($validated['status']) {
            case 'Pending':
                $order->status = 'Pending';
                foreach ($order->products as $orderProduct) {
                    $variant = $orderProduct->variant;

                    if ($variant) {
                        $variant->stock -= $orderProduct->quantity;
                        $variant->reserved_stock += $orderProduct->quantity;
                        $variant->save();
                    }
                }
                break;

            case 'Shipped':
                $order->status = 'Shipped';
                foreach ($order->products as $orderProduct) {
                    $variant = $orderProduct->variant;

                    if ($variant) {
                        $variant->reserved_stock = max(0, $variant->reserved_stock - $orderProduct->quantity);
                        $variant->save();
                    }
                }
                break;

            case 'Delivered':
                $order->status = 'Delivered';
                break;

            case 'Cancelled':
                $order->status = 'Cancelled';
                foreach ($order->products as $orderProduct) {
                    $variant = $orderProduct->variant;

                    if ($variant) {
                        $variant->stock += $orderProduct->quantity;
                        $variant->reserved_stock = max(0, $variant->reserved_stock - $orderProduct->quantity);
                        $variant->save();
                    }
                }
                break;

            case 'Returned':
                $order->status = 'Returned';
                foreach ($order->products as $orderProduct) {
                    $variant = $orderProduct->variant;

                    if ($variant) {
                        $variant->stock += $orderProduct->quantity;
                        $variant->save();
                    }
                }
                break;
        }

        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
}
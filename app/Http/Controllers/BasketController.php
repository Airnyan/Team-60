<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Basket;
use App\Models\BasketProduct;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\ProductVariant;
use DateTime;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    /**
     * Displays basket page.
     */
    public function index()
{
    $user = Auth::user();

    if(!$user) {
        return redirect()->route('login');
    }

    $basket = Basket::with('basket_product')->where('user_id', $user->id)->first();
    
    // Fetch all addresses belonging to this user
    $savedAddresses = \App\Models\Address::where('user_id', $user->id)->get();

    $total = 0;
    foreach($basket->basket_product as $product) {
        $total += $product->price * $product->quantity;
    }

    // Pass $savedAddresses to the view
    return view('basket', compact('basket', 'total', 'savedAddresses'));
}

    /**
     * Adds a new item to the basket.
     */
    public function store(Request $request)
    {
        // $user = User::find(16); //Test Instance
        $user = Auth::user(); //grabs current user
        if(!$user) {
            return redirect()->route('login')->with('error', 'Please log in.');
        }

        $variant = ProductVariant::findOrfail($request->variant_id);
        $basket = Basket::where('user_id', $user->id)->first();
        if (! $basket) {
            $basket = Basket::create(['user_id' => $user->id]);
        }

        $basketproduct = BasketProduct::where('basket_id', $basket->id)->where('variant_id', $variant->id)->first();

        if(!$basketproduct) {
            BasketProduct::create([
            'basket_id' => $basket->id,
            'variant_id' => $variant->id,
            // 'quantity' => $request->quantity, //Quantity should be editable in the shop menu, currently is not.  
            'quantity' => 1,
            'price' => $variant->price
            ]);
        }
        else {
            $basketproduct-> quantity += $request->quantity;
            $basketproduct->save();
        }
        return redirect()->back()->with('success', 'Added to basket.');
    }

    /**
     * Changes quantity of item in basket.
     */
    public function update(Request $request, $variant_id)
    {
        // $user = User::find(16); //Test Instance
        $user = Auth::user(); //grabs current user

        $basket = Basket::where('user_id', $user->id)->first();
        if (! $basket) {
            $basket = Basket::create(['user_id' => $user->id]);
        }
        $change = (int) $request->input('change', 0);
        $basketproduct = BasketProduct::where('basket_id', $basket->id)->where('variant_id', $variant_id)->first();
        $basketproduct->quantity += $change;
        if($basketproduct->quantity < 1) {
            $basketproduct->delete();
            return redirect()->back()->with('success', 'Product Deleted.');
        }
        $basketproduct->save();

        return redirect()->back()->with('success', 'Quantity changed.');
    }

    /**
     * Removes requested item from basket.
     */
    public function destroy($variant_id)
    {
        // $user = User::find(16); //Test Instance
        $user = Auth::user(); //grabs current user

        $basket = Basket::where('user_id', $user->id)->first();
        if (! $basket) {
            $basket = Basket::create(['user_id' => $user->id]);
        }

        $basketproduct = BasketProduct::where('basket_id', $basket->id)->where('variant_id', $variant_id)->first();

        $basketproduct->delete();
        
        return redirect()->back()->with('success', 'Product Deleted.');
    }
    /**
     * Empties the basket.
     */
    public function clear()
    {
        // $user = User::find(16); //Test Instance
        $user = Auth::user(); //grabs current user

        $basket = Basket::where('user_id', $user->id)->first();

        BasketProduct::where('basket_id', $basket->id)->delete();

        return redirect()->back()->with('success', 'Basket emptied.');
    }

public function checkout(Request $request) 
{
    $user = Auth::user();

    // NEW: Check if both address types were submitted
    if ($request->filled('address_id') && $request->filled('address1')) {
        return redirect()->back()->with('error', 'Please either select a saved address OR enter a new one, not both.');
    }
    
    // 1. Get the basket and eager-load the product/variant data
    $basket = Basket::where('user_id', $user->id)->first();
    if (!$basket) {
        return redirect()->route('basket.index');
    }

    // 2. Handle Address logic (Reuse or Create)
    $addressId = null;
    if ($request->filled('address_id')) {
        $addressId = $request->address_id;
    } else {
        $validated = $request->validate([
            'address1' => 'required|string|max:255',
            'address2' => 'nullable|string|max:255',
            'postcode' => 'required|string|max:20',
        ]);

        $address = Address::create([
            'user_id' => $user->id,
            'address_line_1' => $validated['address1'],
            'address_line_2' => $validated['address2'] ?? '',
            'postcode' => $validated['postcode'],
        ]);


        $products = $basket->basket_product;
        $order = Order::create([
            'user_id' => $user->id,
            'address_id' => $address->id,
            'order_date' => now(),
            'status' => 'Pending',
        ]);
        $total = 0;
        foreach($products as $product) {
            $total += $product->price * $product->quantity;
            $product->variant->stock -= $product->quantity;
            $product->variant->reserved_stock += $product->quantity;
            $product->variant->save();
            $order -> products()->create([
                'order_id' => $order->id,
                'variant_id' => $product->variant_id,
                'quantity' => $product->quantity,
            ]);
        }
        $order -> total = $total;
        $order -> save();
        $basket->basket_product()->delete();
        return view('checkout', compact('order', 'products', 'total'));
    }

    // 3. Create the Order
    $order = Order::create([
        'user_id' => $user->id,
        'address_id' => $addressId,
        'order_date' => now(),
        'status' => 'Pending',
    ]);

    // 4. Snapshot data and transfer to OrderProducts
    $total = 0;
    $orderSummary = [];
    // We load the relationships here so they don't disappear after the delete
    $products = $basket->basket_product()->with('variant.product')->get();

    foreach ($products as $product) {
        $total += $product->price * $product->quantity;
        
        $order->products()->create([
            'variant_id' => $product->variant_id,
            'quantity' => $product->quantity,
        ]);

        // Keep this info for the view before we delete the DB rows
        $orderSummary[] = (object)[
            'name'     => $product->variant->product->product_name ?? 'Unknown Product',
            'price'    => $product->variant->price,
            'quantity' => $product->quantity,
            'image'    => $product->variant->product->image ?? null, 
        ];
    } // Ensure this brace is here! This was likely missing.

    // 5. Clear the basket items now that the order is safe
    $basket->basket_product()->delete();

    // 6. Return the view
    return view('checkout', [
        'order' => $order,
        'products' => $orderSummary,
        'total' => number_format($total, 2)
    ]);
}
}
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
        return redirect()->route('login')->with('error', 'Please log in.');
    }

    // Load the basket with its products
    $basket = Basket::with('basket_product')->where('user_id', $user->id)->first();

    if (! $basket) {
        $basket = Basket::create(['user_id' => $user->id]);
    };

    // --- ADD THIS CALCULATION ---
    $total = 0;
    foreach($basket->basket_product as $product) {
        $total += $product->price * $product->quantity;
    }
    // ----------------------------

    // Add 'total' to the compact function
    return view('basket', compact('basket', 'total'));
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

    public function checkout(Request $request) {
        // $user = User::find(16); //Test Instance
        $user = Auth::user();

        $basket = Basket::where('user_id', $user->id)->first();

        $validated = request()->validate([
            'address1' => 'required|string|max:255',
            'address2' => 'required|string|max:255',
            'postcode' => 'required|string|max:20',
        ]);
        $address = Address::create([
            'user_id' => $user->id,
            'address_line_1' => $validated['address1'],
            'address_line_2' => $validated['address2'],
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
            $order -> products()->create([
                'order_id' => $order->id,
                'variant_id' => $product->variant_id,
                'quantity' => $product->quantity,
            ]);
        }
        $basket->basket_product()->delete();
        return view('checkout', compact('order', 'products', 'total'));
    }
}

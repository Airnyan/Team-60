<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\BasketProduct;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
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
        // $user = User::find(16); //Test Instance
        $user = Auth::user(); //grabs current user
        if(!$user) {
            return redirect()->route('login')->with('error', 'Please log in.');
        }
        $basket = Basket::with('basket_product')->where('user_id', $user->id)->first();

        // dd($basket); //Dumps data to debug
        return view('basket', compact('basket'));
    }

    /**
     * Adds a new item to the basket.
     */
    public function store(Request $request)
    {
        $user = User::find(16); //Test Instance
        //$user = Auth::user(); //grabs current user
        if(!$user) {
            return redirect()->route('login')->with('error', 'Please log in.');
        }
        $product = Product::findOrfail($request->product_id);

        $basket = Basket::where('user_id', $user->id)->first();
        if (! $basket) {
            $basket = Basket::create(['user_id' => $user->id]);
        }

        $basketproduct = BasketProduct::where('basket_id', $basket->id)->where('product_id', $product->id)->first();

        if(!$basketproduct) {
            BasketProduct::create([
            'basket_id' => $basket->id,
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'price' => $product->price
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
    public function update(Request $request, $product_id)
    {
        // $user = User::find(16); //Test Instance
        $user = Auth::user(); //grabs current user

        $basket = Basket::where('user_id', $user->id)->first();
        if (! $basket) {
            $basket = Basket::create(['user_id' => $user->id]);
        }

        $basketproduct = BasketProduct::where('basket_id', $basket->id)->where('product_id', $product_id)->first();
        $basketproduct->quantity = $request->quantity;
        $basketproduct->save();

        return redirect()->back()->with('success', 'Quantity changed.');
    }

    /**
     * Removes requested item from basket.
     */
    public function destroy($product_id)
    {
        // $user = User::find(16); //Test Instance
        $user = Auth::user(); //grabs current user

        $basket = Basket::where('user_id', $user->id)->first();
        if (! $basket) {
            $basket = Basket::create(['user_id' => $user->id]);
        }

        $basketproduct = BasketProduct::where('basket_id', $basket->id)->where('product_id', $product_id)->first();

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

    public function checkout() {
        // $user = User::find(16); //Test Instance
        $user = Auth::user();

        $basket = Basket::where('user_id', $user->id)->first();

        $products = $basket->basket_product;
        $order = Order::create([
            'user_id' => $user->id,
            'status' => 'Pending',
        ]);
        $total = 0;
        foreach($products as $product) {
            $total += $product->price * $product->quantity;
            $order->order_product()->create([
                'product_id' => $product->product_id,
                'quantity' => $product->quantity,
                'price' => $product->price,
            ]);
        }
        $basket->basket_product()->delete();
        return view('checkout', compact('order', 'total'));
    }
}

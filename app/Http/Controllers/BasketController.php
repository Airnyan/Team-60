<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\BasketProduct;
use App\Models\User;
use App\Models\Product;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    /**
     * Displays basket page.
     */
    public function index()
    {
        $user = User::find(16); //Test Instance
        //$user = Auth()->user(); //grabs current user

        $basket = Basket::with('basket_product')->where('user_id', $user->id)->get()->first();

        // dd($basket); //Dumps data to debug
        return view('basket', compact('basket'));
    }

    /**
     * Adds a new item to the basket.
     */
    public function store(Request $request)
    {
        $user = User::find(16); //Test Instance
        //$user = Auth()->user(); //grabs current user
        $product = Product::findOrfail($request->product_id);

        $basketproduct = Basket::where('user_id', $user->id)->where('product_id', $product->id);

        if(!$basketproduct) {
            BasketProduct::create([
            'user_id' => $user->id,
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

        $basketproduct = BasketProduct::whereHas('basket', function ($basketCheck) {
            $user = User::find(16); //Test Instance
            //$user = Auth()->user(); //grabs current user
            $basketCheck->where('user_id', $user->id);
        })->find($product_id);

        $basketproduct->quantity = $request->quantity;
        $basketproduct->save();

        return redirect()->back()->with('success', 'Quantity changed.');
    }

    /**
     * Removes requested item from basket.
     */
    public function destroy($product_id)
    {
        $basketproduct = BasketProduct::whereHas('basket', function ($basketCheck) {
            $user = User::find(16); //Test Instance
            //$user = Auth()->user(); //grabs current user
            $basketCheck->where('user_id', $user->id);
        })->find($product_id);

        $basketproduct->delete();
        
        return redirect()->back()->with('success', 'Product Deleted.');
    }
    /**
     * Empties the basket.
     */
    public function clear()
    {
        $user = User::find(16); //Test Instance
        //$user = Auth()->user(); //grabs current user

        $basket = Basket::with('basket_product')->where('user_id', $user->id)->get()->first();

        BasketProduct::where('basket_id', $basket->id)->delete();

        return redirect()->back()->with('success', 'Basket emptied.');
    }
}

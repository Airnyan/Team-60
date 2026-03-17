<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Show review page
    public function showReview()
    {
        return view('review');
    }

    public function store(Request $request)
{

    $request->validate([
        'review' => 'required|min:5',
    ]);

    \App\Models\Review::create([
        'product_id' => $request->input('product_id'),
        'user_id'    => auth()->id(),
        'review'     => $request->input('review'),
        'rating'     => $request->input('rating'),
    ]);

    return redirect()->back()->with('success', 'Review submitted successfully!');
}
}

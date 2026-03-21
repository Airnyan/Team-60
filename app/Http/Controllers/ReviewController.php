<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
class ReviewController extends Controller
{
    // Show review page
public function showReview()
{
    $reviews = Review::latest()->get();
    return view('review', compact('reviews'));
}

    public function store(Request $request)
{

    $request->validate([
        'review' => 'required|min:5',
    ]);

    Review::create([
        'product_id' => $request->input('product_id'),
        'user_id'    => Auth::id(),
        'review'     => $request->input('review'),
        'rating'     => $request->input('rating'),
    ]);

    return redirect()->back()->with('success', 'Review submitted successfully!');
}
}

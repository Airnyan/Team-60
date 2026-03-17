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
        'Product_ID' => 1,
        'User_ID'    => auth()->id(),
        'Review'     => $request->input('review'),
        'Rating'     => 5,
    ]);

    return redirect()->back()->with('success', 'Review submitted successfully!');
}
}

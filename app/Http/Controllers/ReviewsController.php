<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show all reviews for moderation
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    // Show a specific review for moderation
    public function show($id)
    {
        $review = Review::find($id);
        return view('reviews.show', compact('review'));
    }

    // Approve a review
    public function approve($id)
    {
        $review = Review::find($id);
        $review->status = 'approved';
        $review->save();
        return redirect()->route('reviews.index')->with('status', 'Review approved successfully!');
    }

    // Reject a review
    public function reject($id)
    {
        $review = Review::find($id);
        $review->status = 'rejected';
        $review->save();
        return redirect()->route('reviews.index')->with('status', 'Review rejected successfully!');
    }

    // Create a new review
    public function create()
    {
        return view('reviews.create');
    }

    // Store a new review
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'required|string|max:255',
        ]);

        $review = new Review();
        $review->rating = $request->rating;
        $review->feedback = $request->feedback;
        $review->user_id = Auth::id();
        $review->status = 'pending';
        $review->save();

        return redirect()->route('reviews.index')->with('status', 'Review submitted successfully!');
    }

    // Edit an existing review
    public function edit($id)
    {
        $review = Review::find($id);
        return view('reviews.edit', compact('review'));
    }

    // Update an existing review
    public function update(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'required|string|max:255',
        ]);

        $review = Review::find($id);
        $review->rating = $request->rating;
        $review->feedback = $request->feedback;
        $review->save();

        return redirect()->route('reviews.index')->with('status', 'Review updated successfully!');
    }

    // Delete a review
    public function destroy($id)
    {
        $review = Review::find($id);
        $review->delete();
        return redirect()->route('reviews.index')->with('status', 'Review deleted successfully!');
    }
}

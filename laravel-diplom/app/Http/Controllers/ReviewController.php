<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('user')->latest()->get();
        return view('reviews', compact('reviews'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $review = new Review();
        $review->user_id = Auth::id();
        $review->content = $validated['content'];
        $review->save();

        return redirect()->back()->with('success', 'Отзыв добавлен!');
    }
}

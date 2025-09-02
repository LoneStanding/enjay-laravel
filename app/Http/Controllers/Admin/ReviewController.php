<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('admin.review.index', compact('reviews'));
    }

    public function create()
    {
        return view('admin.review.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'profile_path' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'review' => 'required|string',
        ]);

        if ($request->hasFile('profile_path')) {
            $validated['profile_path'] = $request->file('profile_path')->store('reviews', 'public');
        }

        Review::create($validated);
        return redirect()->route('reviews.index')->with('success', 'Review added successfully!');
    }

    public function edit(Review $review)
    {
        return view('admin.review.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'profile_path' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'review' => 'required|string',
        ]);

        if ($request->hasFile('profile_path')) {
            $validated['profile_path'] = $request->file('profile_path')->store('reviews', 'public');
        }

        $review->update($validated);
        return redirect()->route('reviews.index')->with('success', 'Review updated successfully!');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully!');
    }
}

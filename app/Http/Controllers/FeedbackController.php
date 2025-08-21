<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackListController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'feedback_text' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        $feedback = Feedback::create([
            'customer_name' => $request->customer_name,
            'feedback_text' => $request->feedback_text,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }
}


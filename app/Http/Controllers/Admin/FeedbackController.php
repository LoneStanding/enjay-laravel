<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('admin.feedback.index', compact('feedbacks'));
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->route('feedbacks.index')->with('success', 'Customer deleted successfully!');
    }

}

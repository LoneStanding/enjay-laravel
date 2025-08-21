<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::latest()->get();
        $categories = Career::select('category')->distinct()->pluck('category');
        return view('career', compact('careers', 'categories'));
    }

    public function filter(Request $request)
    {
        $query = Career::query();

        if ($request->category && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        $careers = $query->latest()->get();

        return view('partials.career_cards', compact('careers'))->render();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsBlog;

class NewsBlogController extends Controller
{
    public function index()
    {
        $newsBlogs = NewsBlog::latest()->get();
        return view('blog', compact('newsBlogs'));
    }

    public function show($id)
    {
        $blog = NewsBlog::findOrFail($id);
        return view('blogdetails', compact('blog'));
    }
}

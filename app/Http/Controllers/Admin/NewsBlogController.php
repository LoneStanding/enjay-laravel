<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsBlog;

class NewsBlogController extends Controller
{
    public function index()
    {
        $newsBlogs = NewsBlog::all();
        return view('admin.news_blog.index', compact('newsBlogs'));
    }

    public function create()
    {
        return view('admin.news_blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'news_title' => 'required|string|max:255',
            'tag' => 'required|string|max:100',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('newsblogs/images', 'public');
        }

        NewsBlog::create([
            'news_title' => $request->news_title,
            'tag' => $request->tag,
            'image_path' => $imagePath,
            'content' => $request->content,
        ]);

        return redirect()->route('news_blog.index')->with('success', 'News blog created successfully!');
    }

    public function edit(NewsBlog $newsblog)
    {
        return view('admin.news_blog.edit', compact('newsblog'));
    }

    public function update(Request $request, NewsBlog $newsblog)
    {
        $request->validate([
            'news_title' => 'required|string|max:255',
            'tag' => 'required|string|max:100',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $newsblog->image_path = $request->file('image')->store('newsblogs/images', 'public');
        }

        $newsblog->update([
            'news_title' => $request->news_title,
            'tag' => $request->tag,
            'content' => $request->content,
            'image_path' => $newsblog->image_path,
        ]);

        return redirect()->route('news_blog.index')->with('success', 'News blog updated successfully!');
    }

    public function destroy(NewsBlog $newsblog)
    {
        $newsblog->delete();
        return redirect()->route('news_blog.index')->with('success', 'News blog deleted successfully!');
    }
}

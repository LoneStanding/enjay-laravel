<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // Get one product per category
        $categories = Product::select('category', 'image_path')
            ->groupBy('category', 'image_path')
            ->get();

        return view('product', compact('categories'));
    }
}

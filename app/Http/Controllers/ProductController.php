<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // Get one product per category (first product by id)
        $categories = Product::selectRaw('MIN(id) as id, category')
            ->groupBy('category')
            ->get()
            ->map(function ($item) {
                return Product::find($item->id); // fetch actual product
            });

        return view('product', ['categories' => $categories]);
    }

    public function show($category)
    {
        $products = \App\Models\Product::where('category', $category)->get();
        return view('productdetails', compact('category', 'products'));
    }

}

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
    public function showCategory($category)
    {
        // Get all products in this category
        $products = Product::where('product_category', $category)->get();

        if ($products->isEmpty()) {
            abort(404, "No products found in this category.");
        }

        return view('productsdetails', compact('products', 'category'));
    }

}

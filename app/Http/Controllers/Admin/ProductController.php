<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string',
            'product_name' => 'required|string',
            'product_category' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'content' => 'required|string',
        ]);

        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('products', 'public');
        }

        Product::create($validated);
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category' => 'required|string',
            'product_name' => 'required|string',
            'product_category' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'content' => 'required|string',
        ]);

        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('products', 'public');
        }

        $product->update($validated);
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}

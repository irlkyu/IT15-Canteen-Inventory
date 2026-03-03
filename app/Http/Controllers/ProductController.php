<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        $product->load('suppliers');

        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'product_code' => ['required', 'string', 'max:255'],
            'product_name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'current_stock' => ['required', 'integer', 'min:0'],
        ]);

        $product->update($validated);

        return redirect()
            ->route('products.show', $product)
            ->with('success', 'Product updated successfully.');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_code' => ['required', 'string', 'max:255'],
            'product_name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
        ]);

        $initialStock = rand(3, 10);

        $product = Product::create($validated + ['current_stock' => $initialStock]);

        return redirect()
            ->route('products.show', $product)
            ->with('success', 'Product created successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
}


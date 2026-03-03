<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockEntry extends Model
{
    public function store(Request $request) {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|integer|min:1',
            'delivery_reference' => 'required|unique:stock_entries,delivery_reference',
        ]);

        \DB::transaction(function () use ($request) {
            $product = Product::findOrFail($request->product_id);

            $product->suppliers()->attach($request->supplier_id, [
                'quantity' => $request->quantity,
                'delivery_reference' => $request->delivery_reference
            ]);

            $product->increment('current_stock', $request->quantity);
        });

        return back()->with('success', 'Stock delivery recorded!');
    }
}

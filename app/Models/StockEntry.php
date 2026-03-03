<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StockEntry extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function store(Request $request) {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|integer|min:1',
        ]);

        \DB::transaction(function () use ($request) {
            $product = Product::findOrFail($request->product_id);

            $reference = 'DEL-' . now()->format('Ymd-His') . '-' . Str::upper(Str::random(4));

            $product->suppliers()->attach($request->supplier_id, [
                'quantity' => $request->quantity,
                'delivery_reference' => $reference,
            ]);

            $product->increment('current_stock', $request->quantity);
        });

        return back()->with('success', 'Stock delivery recorded!');
    }
}

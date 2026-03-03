<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockEntry;
use App\Models\Supplier;
use Illuminate\Http\Request;

class StockEntryController extends Controller
{
    public function create()
    {
        $products = Product::orderBy('product_name')->get();
        $suppliers = Supplier::orderBy('supplier_name')->get();

        return view('stock_entries.create', compact('products', 'suppliers'));
    }

    public function store(Request $request)
    {
        // Reuse existing business logic on the model
        (new StockEntry())->store($request);

        return redirect()
            ->route('stock-entries.create')
            ->with('success', 'Stock delivery recorded and inventory updated.');
    }
}


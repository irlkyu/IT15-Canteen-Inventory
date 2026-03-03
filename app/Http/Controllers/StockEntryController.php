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
        $entries = StockEntry::with(['product', 'supplier'])
            ->latest()
            ->limit(20)
            ->get();

        return view('stock_entries.create', compact('products', 'suppliers', 'entries'));
    }

    public function store(Request $request)
    {
        (new StockEntry())->store($request);

        return redirect()
            ->route('stock-entries.create')
            ->with('success', 'Stock delivery recorded and inventory updated.');
    }
}


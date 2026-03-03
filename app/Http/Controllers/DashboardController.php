<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\StockEntry;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $supplierCount = Supplier::count();
        $stockCount = StockEntry::count();

        $products = Product::orderBy('product_name')->get();

        return view('dashboard.index', compact('productCount', 'supplierCount', 'stockCount', 'products'));
    }
}


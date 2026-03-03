<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StockEntryController;

Route::get('/', function () {
    return redirect()->route('dashboard.index');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::resource('products', ProductController::class);
Route::resource('suppliers', SupplierController::class);

Route::get('stock-entries/create', [StockEntryController::class, 'create'])->name('stock-entries.create');
Route::post('stock-entries', [StockEntryController::class, 'store'])->name('stock-entries.store');


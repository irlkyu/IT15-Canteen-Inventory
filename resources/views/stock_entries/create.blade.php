@extends('layouts.dashboard')

@section('title', 'Add Stock Entry')
@section('page_title', 'Add Stock Entry')

@section('content')
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 space-y-5">
        <header class="flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-[var(--color-dark)]">Record New Stock Delivery</h2>
                <p class="mt-1 text-sm text-slate-600">
                    Select a product and supplier, then specify the delivered quantity.
                </p>
            </div>
        </header>

        <form action="{{ route('stock-entries.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="grid md:grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label for="product-search" class="block text-xs font-semibold tracking-wide text-slate-700 uppercase">
                        Product
                    </label>
                    <input id="product-search" type="text"
                           placeholder="Search product..."
                           class="w-full rounded-md border-slate-300 text-sm focus:border-[var(--color-primary)] focus:ring-[var(--color-primary)]"
                           data-filter-target="#product_id">
                    <select id="product_id" name="product_id"
                            class="mt-1 w-full rounded-md border-slate-300 text-sm focus:border-[var(--color-primary)] focus:ring-[var(--color-primary)]"
                            required>
                        <option value="">Select product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">
                                {{ $product->product_code }} — {{ $product->product_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-1.5">
                    <label for="supplier-search" class="block text-xs font-semibold tracking-wide text-slate-700 uppercase">
                        Supplier
                    </label>
                    <input id="supplier-search" type="text"
                           placeholder="Search supplier..."
                           class="w-full rounded-md border-slate-300 text-sm focus:border-[var(--color-primary)] focus:ring-[var(--color-primary)]"
                           data-filter-target="#supplier_id">
                    <select id="supplier_id" name="supplier_id"
                            class="mt-1 w-full rounded-md border-slate-300 text-sm focus:border-[var(--color-primary)] focus:ring-[var(--color-primary)]"
                            required>
                        <option value="">Select supplier</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">
                                {{ $supplier->supplier_code }} — {{ $supplier->supplier_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-4">
                <div class="space-y-1.5">
                    <label for="quantity" class="block text-xs font-semibold tracking-wide text-slate-700 uppercase">
                        Quantity
                    </label>
                    <input type="number" min="1" id="quantity" name="quantity"
                           class="w-full rounded-md border-slate-300 text-sm focus:border-[var(--color-primary)] focus:ring-[var(--color-primary)]"
                           required>
                </div>

                <div class="md:col-span-2 space-y-1.5">
                    <label for="delivery_reference" class="block text-xs font-semibold tracking-wide text-slate-700 uppercase">
                        Delivery Reference
                    </label>
                    <input type="text" id="delivery_reference" name="delivery_reference"
                           class="w-full rounded-md border-slate-300 text-sm focus:border-[var(--color-primary)] focus:ring-[var(--color-primary)]"
                           placeholder="e.g. INV-2026-0012"
                           required>
                </div>
            </div>

            <div class="flex items-center justify-end gap-2 pt-2">
                <a href="{{ url()->previous() }}"
                   class="inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-3 py-1.5 text-xs font-medium text-slate-700 hover:bg-slate-50">
                    Cancel
                </a>
                <button type="submit"
                        class="inline-flex items-center justify-center rounded-md bg-[var(--color-primary)] px-4 py-1.5 text-xs font-semibold text-white shadow-sm hover:bg-lime-700">
                    Save Stock Entry
                </button>
            </div>
        </form>
    </div>
@endsection


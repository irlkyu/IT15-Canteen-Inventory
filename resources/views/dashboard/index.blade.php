@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
    <section class="grid gap-4 md:grid-cols-3 mb-6">
        <article
            class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden flex flex-col justify-between">
            <div class="h-1.5 bg-gradient-to-r from-[var(--color-primary)] to-[var(--color-secondary)]"></div>
            <div class="p-4">
                <p class="text-xs font-semibold tracking-[0.18em] text-slate-500 uppercase mb-1">Total Products</p>
                <p class="text-2xl font-semibold text-[var(--color-dark)]">{{ $productCount }}</p>
            </div>
        </article>

        <article
            class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden flex flex-col justify-between">
            <div class="h-1.5 bg-gradient-to-r from-[var(--color-primary)] to-[var(--color-secondary)]"></div>
            <div class="p-4">
                <p class="text-xs font-semibold tracking-[0.18em] text-slate-500 uppercase mb-1">Total Suppliers</p>
                <p class="text-2xl font-semibold text-[var(--color-dark)]">{{ $supplierCount }}</p>
            </div>
        </article>

        <article
            class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden flex flex-col justify-between">
            <div class="h-1.5 bg-gradient-to-r from-[var(--color-primary)] to-[var(--color-secondary)]"></div>
            <div class="p-4">
                <p class="text-xs font-semibold tracking-[0.18em] text-slate-500 uppercase mb-1">Total Stock Entries</p>
                <p class="text-2xl font-semibold text-[var(--color-dark)]">{{ $stockCount }}</p>
            </div>
        </article>
    </section>
    <section class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <header class="px-5 pt-4 pb-3 border-b border-slate-200 flex items-center justify-between">
            <div>
                <h2 class="text-xs font-semibold tracking-[0.18em] text-[var(--color-primary)] uppercase">
                    Product Overview
                </h2>
                <p class="mt-1 text-xs text-slate-500">
                    Snapshot of all products, pricing, and current stock.
                </p>
            </div>
        </header>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-[var(--color-secondary)]/60">
                    <tr class="text-left text-xs font-semibold uppercase tracking-wide text-slate-700">
                        <th class="px-4 py-2">Product Code</th>
                        <th class="px-4 py-2">Product Name</th>
                        <th class="px-4 py-2">Price</th>
                        <th class="px-4 py-2">Current Stock</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($products as $product)
                        <tr class="odd:bg-white even:bg-slate-50/60 hover:bg-[var(--color-secondary)]/20">
                            <td class="px-4 py-2 whitespace-nowrap">{{ $product->product_code }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $product->product_name }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">₱{{ number_format($product->price, 2) }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $product->current_stock }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-3 text-center text-sm text-slate-500">
                                No products found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection



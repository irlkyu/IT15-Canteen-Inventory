@extends('layouts.dashboard')

@section('title', 'Product Detail')
@section('page_title', 'Product Detail')

@section('content')
    <header class="mb-4">
        <h1 class="text-lg font-semibold text-[var(--color-dark)]">{{ $product->product_name }}</h1>
        <p class="mt-1 text-sm text-slate-600">
            Detailed view of product and its delivery history.
        </p>
    </header>

    <section class="grid gap-4 md:grid-cols-[minmax(0,2fr)_minmax(0,1.2fr)]">
        <article class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
            <h2 class="text-xs font-semibold tracking-[0.18em] text-[var(--color-primary)] uppercase mb-3">
                Product Information
            </h2>
            <dl class="grid gap-3 md:grid-cols-2 text-sm">
                <div>
                    <dt class="text-xs font-semibold tracking-wide text-slate-500 uppercase">Product Code</dt>
                    <dd class="mt-0.5 text-[var(--color-dark)] font-medium">{{ $product->product_code }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold tracking-wide text-slate-500 uppercase">Product Name</dt>
                    <dd class="mt-0.5 text-[var(--color-dark)] font-medium">{{ $product->product_name }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold tracking-wide text-slate-500 uppercase">Price</dt>
                    <dd class="mt-0.5 text-[var(--color-dark)] font-medium">₱{{ number_format($product->price, 2) }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold tracking-wide text-slate-500 uppercase">Current Stock</dt>
                    <dd class="mt-0.5 text-[var(--color-dark)] font-medium">{{ $product->current_stock }}</dd>
                </div>
            </dl>
        </article>

        <article class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
            <h2 class="text-xs font-semibold tracking-[0.18em] text-[var(--color-primary)] uppercase mb-3">
                Total Quantity History
            </h2>
            @php
                $totalQuantity = $product->suppliers->sum(function ($supplier) {
                    return $supplier->pivot->quantity;
                });
            @endphp
            <p class="text-sm text-slate-700">
                <span class="font-semibold">Total Delivered Quantity:</span>
                <span class="ml-1 text-base font-semibold text-[var(--color-dark)]">{{ $totalQuantity }}</span>
            </p>
            <p class="mt-2 text-xs text-slate-500">
                Based on all recorded deliveries for this product.
            </p>
        </article>
    </section>

    <section class="mt-5 bg-white rounded-xl shadow-sm border border-slate-200">
        <header class="px-5 pt-4 pb-3 border-b border-slate-200">
            <h2 class="text-xs font-semibold tracking-[0.18em] text-[var(--color-primary)] uppercase">
                Suppliers Who Delivered
            </h2>
        </header>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-[var(--color-secondary)]/60">
                    <tr class="text-left text-xs font-semibold uppercase tracking-wide text-slate-700">
                        <th class="px-4 py-2">Supplier Name</th>
                        <th class="px-4 py-2">Quantity Delivered</th>
                        <th class="px-4 py-2">Delivery Reference</th>
                        <th class="px-4 py-2">Date Delivered</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($product->suppliers as $supplier)
                        <tr class="odd:bg-white even:bg-slate-50/60 hover:bg-[var(--color-secondary)]/20">
                            <td class="px-4 py-2 whitespace-nowrap">{{ $supplier->supplier_name }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $supplier->pivot->quantity }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $supplier->pivot->delivery_reference }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">
                                {{ optional($supplier->pivot->created_at)->format('Y-m-d') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-3 text-center text-sm text-slate-500">
                                No delivery records found for this product.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection


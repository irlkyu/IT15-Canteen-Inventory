@extends('layouts.dashboard')

@section('title', 'Stock Entry')
@section('page_title', 'Stock Entry')

@section('content')
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 space-y-5 mb-5">
        <header>
            <h2 class="text-lg font-semibold text-[var(--color-dark)]">New Stock Entry</h2>
            <p class="mt-1 text-sm text-slate-600">
                Select a product and supplier, then record the quantity delivered.
            </p>
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

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 space-y-3">
        <header class="flex items-center justify-between">
            <div>
                <h2 class="text-xs font-semibold tracking-[0.18em] text-[var(--color-primary)] uppercase">
                    Stock Entry History
                </h2>
                <p class="mt-1 text-xs text-slate-600">
                    Recent stock movements for quick tracking.
                </p>
            </div>
        </header>

        <div class="overflow-x-auto mt-2">
            <table class="min-w-full text-sm">
                <thead class="bg-[var(--color-secondary)]/60">
                    <tr class="text-left text-xs font-semibold uppercase tracking-wide text-slate-700">
                        <th class="px-4 py-2">Date</th>
                        <th class="px-4 py-2">Product</th>
                        <th class="px-4 py-2">Supplier</th>
                        <th class="px-4 py-2 text-right">Qty</th>
                        <th class="px-4 py-2">Reference</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($entries as $entry)
                        <tr class="odd:bg-white even:bg-slate-50/60 hover:bg-[var(--color-secondary)]/20">
                            <td class="px-4 py-2 whitespace-nowrap text-slate-700">
                                {{ optional($entry->created_at)->format('Y-m-d H:i') }}
                            </td>
                            <td class="px-4 py-2">
                                <div class="max-w-[22rem] truncate">
                                    {{ optional($entry->product)->product_name ?? '—' }}
                                </div>
                            </td>
                            <td class="px-4 py-2">
                                <div class="max-w-[18rem] truncate">
                                    {{ optional($entry->supplier)->supplier_name ?? '—' }}
                                </div>
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap text-right font-semibold text-[var(--color-dark)]">
                                {{ $entry->quantity }}
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap font-mono text-xs text-slate-600">
                                {{ $entry->delivery_reference ?? '—' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-3 text-center text-sm text-slate-500">
                                No stock entries recorded yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection


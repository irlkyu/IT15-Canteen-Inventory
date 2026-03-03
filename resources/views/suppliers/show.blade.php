@extends('layouts.dashboard')

@section('title', 'Supplier Detail')
@section('page_title', 'Supplier Detail')

@section('content')
    <header class="mb-4">
        <h1 class="text-lg font-semibold text-[var(--color-dark)]">{{ $supplier->supplier_name }}</h1>
        <p class="mt-1 text-sm text-slate-600">
            Information about the supplier and their delivery history.
        </p>
    </header>

    <section class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
        <h2 class="text-xs font-semibold tracking-[0.18em] text-[var(--color-primary)] uppercase mb-3">
            Supplier Information
        </h2>
        <dl class="grid gap-3 md:grid-cols-2 text-sm">
            <div>
                <dt class="text-xs font-semibold tracking-wide text-slate-500 uppercase">Supplier Code</dt>
                <dd class="mt-0.5 text-[var(--color-dark)] font-medium">{{ $supplier->supplier_code }}</dd>
            </div>
            <div>
                <dt class="text-xs font-semibold tracking-wide text-slate-500 uppercase">Supplier Name</dt>
                <dd class="mt-0.5 text-[var(--color-dark)] font-medium">{{ $supplier->supplier_name }}</dd>
            </div>
            <div>
                <dt class="text-xs font-semibold tracking-wide text-slate-500 uppercase">Contact Email</dt>
                <dd class="mt-0.5 text-[var(--color-dark)] font-medium">{{ $supplier->contact_email }}</dd>
            </div>
            <div>
                <dt class="text-xs font-semibold tracking-wide text-slate-500 uppercase">Contact Number</dt>
                <dd class="mt-0.5 text-[var(--color-dark)] font-medium">{{ $supplier->contact_number }}</dd>
            </div>
        </dl>
    </section>

    <section class="mt-5 bg-white rounded-xl shadow-sm border border-slate-200">
        <header class="px-5 pt-4 pb-3 border-b border-slate-200">
            <h2 class="text-xs font-semibold tracking-[0.18em] text-[var(--color-primary)] uppercase">
                Products Supplied
            </h2>
            <p class="mt-1 text-xs text-slate-500">
                Overview of all recorded product deliveries made by this supplier.
            </p>
        </header>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-[var(--color-secondary)]/60">
                    <tr class="text-left text-xs font-semibold uppercase tracking-wide text-slate-700">
                        <th class="px-4 py-2">Product Name</th>
                        <th class="px-4 py-2">Quantity Delivered</th>
                        <th class="px-4 py-2">Delivery Reference</th>
                        <th class="px-4 py-2">Date Delivered</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($supplier->products as $product)
                        <tr class="odd:bg-white even:bg-slate-50/60 hover:bg-[var(--color-secondary)]/20">
                            <td class="px-4 py-2 whitespace-nowrap">{{ $product->product_name }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $product->pivot->quantity }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $product->pivot->delivery_reference }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">
                                {{ optional($product->pivot->created_at)->format('Y-m-d') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-3 text-center text-sm text-slate-500">
                                No product deliveries recorded for this supplier.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection




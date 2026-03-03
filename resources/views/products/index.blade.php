@extends('layouts.dashboard')

@section('title', 'Products')
@section('page_title', 'Products')

@section('content')
    <header class="flex items-center justify-between mb-4">
        <div>
            <h1 class="text-lg font-semibold text-[var(--color-dark)]">Products</h1>
            <p class="mt-1 text-sm text-slate-600">
                Overview of all products in the canteen inventory.
            </p>
        </div>
        <a href="{{ route('products.create') }}"
           class="inline-flex items-center rounded-md bg-[var(--color-primary)] px-4 py-1.5 text-xs font-semibold text-white shadow-sm hover:bg-lime-700">
            + Add Product
        </a>
    </header>

    <section class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-[var(--color-secondary)]/60">
                    <tr class="text-left text-xs font-semibold uppercase tracking-wide text-slate-700">
                        <th scope="col" class="px-4 py-2">Product Code</th>
                        <th scope="col" class="px-4 py-2">Product Name</th>
                        <th scope="col" class="px-4 py-2">Price</th>
                        <th scope="col" class="px-4 py-2">Current Stock</th>
                        <th scope="col" class="px-4 py-2 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($products as $product)
                        <tr class="odd:bg-white even:bg-slate-50/60 hover:bg-[var(--color-secondary)]/20">
                            <td class="px-4 py-2 whitespace-nowrap">{{ $product->product_code }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $product->product_name }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">₱{{ number_format($product->price, 2) }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $product->current_stock }}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-right space-x-2">
                                <a href="{{ route('products.show', $product->id) }}"
                                   class="inline-flex items-center rounded-md bg-[var(--color-primary)] px-3 py-1 text-xs font-semibold text-white hover:bg-lime-700">
                                    View
                                </a>
                                <a href="{{ route('products.edit', $product->id) }}"
                                   class="inline-flex items-center rounded-md border border-[var(--color-secondary)] bg-white px-3 py-1 text-xs font-semibold text-[var(--color-dark)] hover:bg-[var(--color-secondary)]/20">
                                    Edit
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block"
                                      onsubmit="return confirm('Delete this product? This cannot be undone.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center rounded-md border border-red-300 bg-white px-3 py-1 text-xs font-semibold text-red-700 hover:bg-red-50">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-3 text-center text-sm text-slate-500">
                                No products found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection


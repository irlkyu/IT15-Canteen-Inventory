@extends('layouts.dashboard')

@section('title', 'Edit Product')
@section('page_title', 'Edit Product')

@section('content')
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 max-w-xl">
        <h1 class="text-lg font-semibold text-[var(--color-dark)] mb-4">Edit Product</h1>

        <form action="{{ route('products.update', $product) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="space-y-1.5">
                <label for="product_code" class="block text-xs font-semibold tracking-wide text-slate-700 uppercase">
                    Product Code
                </label>
                <input type="text" id="product_code" name="product_code"
                       value="{{ old('product_code', $product->product_code) }}"
                       class="w-full rounded-md border-slate-300 text-sm focus:border-[var(--color-primary)] focus:ring-[var(--color-primary)]"
                       required>
            </div>

            <div class="space-y-1.5">
                <label for="product_name" class="block text-xs font-semibold tracking-wide text-slate-700 uppercase">
                    Product Name
                </label>
                <input type="text" id="product_name" name="product_name"
                       value="{{ old('product_name', $product->product_name) }}"
                       class="w-full rounded-md border-slate-300 text-sm focus:border-[var(--color-primary)] focus:ring-[var(--color-primary)]"
                       required>
            </div>

            <div class="space-y-1.5">
                <label for="price" class="block text-xs font-semibold tracking-wide text-slate-700 uppercase">
                    Price (₱)
                </label>
                <input type="number" step="0.01" min="0" id="price" name="price"
                       value="{{ old('price', $product->price) }}"
                       class="w-full rounded-md border-slate-300 text-sm focus:border-[var(--color-primary)] focus:ring-[var(--color-primary)]"
                       required>
            </div>

            <div class="flex items-center justify-end gap-2 pt-2">
                <a href="{{ route('products.show', $product) }}"
                   class="inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-3 py-1.5 text-xs font-medium text-slate-700 hover:bg-slate-50">
                    Cancel
                </a>
                <button type="submit"
                        class="inline-flex items-center justify-center rounded-md bg-[var(--color-primary)] px-4 py-1.5 text-xs font-semibold text-white shadow-sm hover:bg-lime-700">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
@endsection


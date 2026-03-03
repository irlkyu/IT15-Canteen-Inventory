@extends('layouts.dashboard')

@section('title', 'Add Supplier')
@section('page_title', 'Add Supplier')

@section('content')
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 max-w-xl">
        <h1 class="text-lg font-semibold text-[var(--color-dark)] mb-4">Add New Supplier</h1>

        <form action="{{ route('suppliers.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="space-y-1.5">
                <label for="supplier_code" class="block text-xs font-semibold tracking-wide text-slate-700 uppercase">
                    Supplier Code
                </label>
                <input type="text" id="supplier_code" name="supplier_code"
                       value="{{ old('supplier_code') }}"
                       class="w-full rounded-md border-slate-300 text-sm focus:border-[var(--color-primary)] focus:ring-[var(--color-primary)]"
                       required>
            </div>

            <div class="space-y-1.5">
                <label for="supplier_name" class="block text-xs font-semibold tracking-wide text-slate-700 uppercase">
                    Supplier Name
                </label>
                <input type="text" id="supplier_name" name="supplier_name"
                       value="{{ old('supplier_name') }}"
                       class="w-full rounded-md border-slate-300 text-sm focus:border-[var(--color-primary)] focus:ring-[var(--color-primary)]"
                       required>
            </div>

            <div class="space-y-1.5">
                <label for="contact_email" class="block text-xs font-semibold tracking-wide text-slate-700 uppercase">
                    Contact Email
                </label>
                <input type="email" id="contact_email" name="contact_email"
                       value="{{ old('contact_email') }}"
                       class="w-full rounded-md border-slate-300 text-sm focus:border-[var(--color-primary)] focus:ring-[var(--color-primary)]">
            </div>

            <div class="space-y-1.5">
                <label for="contact_number" class="block text-xs font-semibold tracking-wide text-slate-700 uppercase">
                    Contact Number
                </label>
                <input type="text" id="contact_number" name="contact_number"
                       value="{{ old('contact_number') }}"
                       class="w-full rounded-md border-slate-300 text-sm focus:border-[var(--color-primary)] focus:ring-[var(--color-primary)]">
            </div>

            <div class="flex items-center justify-end gap-2 pt-2">
                <a href="{{ route('suppliers.index') }}"
                   class="inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-3 py-1.5 text-xs font-medium text-slate-700 hover:bg-slate-50">
                    Cancel
                </a>
                <button type="submit"
                        class="inline-flex items-center justify-center rounded-md bg-[var(--color-primary)] px-4 py-1.5 text-xs font-semibold text-white shadow-sm hover:bg-lime-700">
                    Save Supplier
                </button>
            </div>
        </form>
    </div>
@endsection


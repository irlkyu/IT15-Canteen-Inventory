@extends('layouts.dashboard')

@section('title', 'Suppliers')
@section('page_title', 'Suppliers')

@section('content')
    <header class="flex items-center justify-between mb-4">
        <div>
            <h1 class="text-lg font-semibold text-[var(--color-dark)]">Suppliers</h1>
            <p class="mt-1 text-sm text-slate-600">
                Registered suppliers for the canteen.
            </p>
        </div>
        <a href="{{ route('suppliers.create') }}"
           class="inline-flex items-center rounded-md bg-[var(--color-primary)] px-4 py-1.5 text-xs font-semibold text-white shadow-sm hover:bg-lime-700">
            + Add Supplier
        </a>
    </header>

    <section class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-[var(--color-secondary)]/60">
                    <tr class="text-left text-xs font-semibold uppercase tracking-wide text-slate-700">
                        <th scope="col" class="px-4 py-2">Supplier Code</th>
                        <th scope="col" class="px-4 py-2">Supplier Name</th>
                        <th scope="col" class="px-4 py-2">Email</th>
                        <th scope="col" class="px-4 py-2">Contact Number</th>
                        <th scope="col" class="px-4 py-2 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($suppliers as $supplier)
                        <tr class="odd:bg-white even:bg-slate-50/60 hover:bg-[var(--color-secondary)]/20">
                            <td class="px-4 py-2 whitespace-nowrap">{{ $supplier->supplier_code }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $supplier->supplier_name }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $supplier->contact_email }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $supplier->contact_number }}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-right space-x-2">
                                <a href="{{ route('suppliers.show', $supplier->id) }}"
                                   class="inline-flex items-center rounded-md bg-[var(--color-primary)] px-3 py-1 text-xs font-semibold text-white hover:bg-lime-700">
                                    View
                                </a>
                                <a href="{{ route('suppliers.edit', $supplier->id) }}"
                                   class="inline-flex items-center rounded-md border border-[var(--color-secondary)] bg-white px-3 py-1 text-xs font-semibold text-[var(--color-dark)] hover:bg-[var(--color-secondary)]/20">
                                    Edit
                                </a>
                                <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="inline-block"
                                      onsubmit="return confirm('Delete this supplier? This cannot be undone.');">
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
                                No suppliers found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection

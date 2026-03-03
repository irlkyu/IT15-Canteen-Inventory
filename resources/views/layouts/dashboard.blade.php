<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Canteen Inventory')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="min-h-screen flex bg-[var(--color-secondary)/10]">
        <aside
            class="hidden md:flex md:flex-col w-64 bg-[var(--color-dark)] text-white border-r border-black/10 fixed inset-y-0 z-20">
            <div class="flex items-center gap-3 px-6 py-4 border-b border-white/10">
                <img src="{{ asset('images/canteen.png') }}" alt="Canteen Logo" class="h-10 object-contain">
                <div class="flex flex-col">
                    <span class="text-sm font-semibold tracking-[0.2em] uppercase text-[var(--color-primary)]">Canteen</span>
                    <span class="text-sm font-medium">Inventory System</span>
                </div>
            </div>

            <nav class="flex-1 px-4 py-3 space-y-1 text-sm">
                <a href="{{ route('dashboard.index') }}"
                   class="flex items-center gap-2 px-3 py-2 rounded-md transition
                   {{ request()->routeIs('dashboard.index') ? 'bg-[var(--color-primary)] text-white' : 'text-gray-200 hover:bg-white/10' }}">
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('products.index') }}"
                   class="flex items-center gap-2 px-3 py-2 rounded-md transition
                   {{ request()->routeIs('products.*') ? 'bg-[var(--color-primary)] text-white' : 'text-gray-200 hover:bg-white/10' }}">
                    <span>Products</span>
                </a>
                <a href="{{ route('suppliers.index') }}"
                   class="flex items-center gap-2 px-3 py-2 rounded-md transition
                   {{ request()->routeIs('suppliers.*') ? 'bg-[var(--color-primary)] text-white' : 'text-gray-200 hover:bg-white/10' }}">
                    <span>Suppliers</span>
                </a>
                <a href="{{ route('stock-entries.create') }}"
                   class="flex items-center gap-2 px-3 py-2 rounded-md transition
                   {{ request()->routeIs('stock-entries.*') ? 'bg-[var(--color-primary)] text-white' : 'text-gray-200 hover:bg-white/10' }}">
                    <span>Stock Entry</span>
                </a>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col md:ml-64 min-h-screen">
            <header class="h-14 flex items-center justify-between px-4 md:px-8 bg-white/80 backdrop-blur border-b border-slate-200">
                <div class="flex items-center gap-3">
                    <button class="md:hidden inline-flex items-center justify-center rounded-md p-2 text-slate-700 border border-slate-300 bg-white"
                            type="button" id="sidebar-toggle" aria-label="Toggle navigation">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <div class="flex items-center gap-2">
                        <h1 class="text-base font-semibold text-[var(--color-dark)]">
                            @yield('page_title', 'Dashboard')
                        </h1>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/canteen.png') }}" alt="Canteen Logo" class="hidden md:block h-10 object-contain">
                </div>
            </header>

            <main class="flex-1">
                <div class="container py-6 space-y-4">
                    @if (session('success'))
                        <div class="rounded-md bg-[var(--color-primary)]/10 border border-[var(--color-primary)] px-4 py-3 text-sm text-[var(--color-dark)]">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="rounded-md bg-red-50 border border-red-300 px-4 py-3 text-sm text-red-800 space-y-1">
                            <div class="font-semibold">There were some problems with your input:</div>
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
</html>


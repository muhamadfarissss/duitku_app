<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'DuitKu') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f8fafc] font-sans text-[#0f172a] overflow-hidden">
    <div class="h-screen flex w-full">

        <!-- Sidebar Master -->
        <aside class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between shrink-0 h-full overflow-y-auto">
            <div>
                <div class="px-6 py-8 flex items-center gap-4">
                    <div class="w-12 h-12 bg-[#0061cc] rounded-2xl flex items-center justify-center shadow-sm">
                        <svg class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="5" width="20" height="14" rx="2" />
                            <line x1="2" y1="10" x2="22" y2="10" />
                            <circle cx="18" cy="14" r="1" fill="currentColor" />
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-[#0061cc] tracking-tight">DuitKu</h1>
                </div>

                <!-- Navigasi Dinamis Lengkap -->
                <nav class="px-5 mt-2 space-y-2">
                    
                    <!-- Menu Dashboard -->
                    <a href="{{ route('dashboard') }}" 
                       class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-semibold transition-colors 
                       {{ request()->routeIs('dashboard') ? 'bg-[#0061cc] text-white shadow-sm' : 'text-gray-600 hover:bg-gray-100' }}">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" /></svg>
                        Dashboard
                    </a>

                    <!-- Menu Transaksi -->
                    <a href="{{ route('transaction') }}" 
                       class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-semibold transition-colors 
                       {{ request()->routeIs('transaction') ? 'bg-[#0061cc] text-white shadow-sm' : 'text-gray-600 hover:bg-gray-100' }}">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 14h6m-6-4h6m-7 10h8a2 2 0 002-2V6a2 2 0 00-2-2H8a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        Transaksi
                    </a>

                    <!-- Menu Kategori -->
                    <a href="{{ route('category') }}" 
                       class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-semibold transition-colors
                       {{ request()->routeIs('category') ? 'bg-[#0061cc] text-white shadow-sm' : 'text-gray-600 hover:bg-gray-100' }}">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 3a9 9 0 108.95 10H11V3z" /><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 00-9-9v9h9z" /></svg>
                        Kategori
                    </a>

                    <!-- Menu AI Quick Input -->
                    <a href="#" 
                       class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-semibold transition-colors text-gray-600 hover:bg-gray-100">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                        AI Quick Input
                    </a>

                    <!-- Menu AI Insight -->
                    <a href="#" 
                       class="flex items-center gap-4 px-4 py-3 rounded-xl text-sm font-semibold transition-colors text-gray-600 hover:bg-gray-100">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 19V9m5 10V5m5 14v-7m5 7V3" /></svg>
                        AI Insight
                    </a>

                </nav>
            </div>

            <!-- Bagian Profil -->
            <div class="p-6 border-t border-gray-200 mt-8">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-full bg-blue-100 text-[#0061cc] flex items-center justify-center font-bold">
                        {{ strtoupper(substr(Auth::user()->name ?? 'US', 0, 2)) }}
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-sm font-semibold text-gray-800 truncate">{{ Auth::user()->name ?? 'Pengguna' }}</p>
                        <p class="text-xs text-gray-500">User</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 border border-gray-300 rounded-xl py-3 text-sm font-medium text-gray-700 hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H9m4 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" /></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <!-- Area Konten -->
        <main class="flex-1 h-full overflow-y-auto bg-[#f8fafc]">
            {{ $slot }}
        </main>

    </div>

    @stack('scripts')
</body>
</html>
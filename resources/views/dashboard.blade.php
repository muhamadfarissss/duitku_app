<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DuitKu - Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f8fafc] font-sans text-[#0f172a]">
    <div class="min-h-screen flex">

        <aside class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between">

            <div>
                <div class="px-6 py-8 flex items-center gap-4">
                    <div class="w-12 h-12 bg-[#0061cc] rounded-2xl flex items-center justify-center shadow-sm">
                        <svg class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="5" width="20" height="14" rx="2" />
                            <line x1="2" y1="10" x2="22" y2="10" />
                            <circle cx="18" cy="14" r="1" fill="currentColor" />
                        </svg>
                    </div>

                    <h1 class="text-3xl font-bold text-[#0061cc] tracking-tight">
                        DuitKu
                    </h1>
                </div>

                <nav class="px-5 mt-6 space-y-4">
                    <a href="#" class="flex items-center gap-4 px-4 py-3 bg-[#0061cc] text-white rounded-xl text-sm font-semibold shadow-sm">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
                        </svg>
                        Dashboard
                    </a>

                    <a href="/transaction" class="flex items-center gap-4 px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-xl text-sm font-medium">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 14h6m-6-4h6m-7 10h8a2 2 0 002-2V6a2 2 0 00-2-2H8a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Transaksi
                    </a>
                    <a href="#" class="flex items-center gap-4 px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-xl text-sm font-medium">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 3a9 9 0 108.95 10H11V3z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 00-9-9v9h9z" />
                        </svg>
                        Kategori
                    </a>

                    <a href="#" class="flex items-center gap-4 px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-xl text-sm font-medium">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        AI Quick Input
                    </a>

                    <a href="#" class="flex items-center gap-4 px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-xl text-sm font-medium">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 19V9m5 10V5m5 14v-7m5 7V3" />
                        </svg>
                        AI Insight
                    </a>
                </nav>
            </div>

            <div class="p-6 border-t border-gray-200">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-full bg-blue-100 text-[#0061cc] flex items-center justify-center font-bold">
                        MS
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-gray-800">
                            Mei Sari
                        </p>
                        <p class="text-xs text-gray-500">
                            User
                        </p>
                    </div>
                </div>

                <button class="w-full flex items-center justify-center gap-2 border border-gray-300 rounded-xl py-3 text-sm font-medium text-gray-700 hover:bg-gray-100">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 16l4-4m0 0l-4-4m4 4H9m4 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
                    </svg>
                    Keluar
                </button>
            </div>
        </aside>

        <main class="flex-1 px-10 py-12">
            <div class="mb-12">
                <h2 class="text-4xl font-bold tracking-tight text-[#0f172a]">
                    Dashboard
                </h2>
                <p class="text-gray-500 mt-2 text-lg">
                    Ringkasan keuangan Anda bulan ini
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-28">
                <div class="bg-white rounded-2xl p-7 shadow-lg shadow-gray-200/70">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-[#0061cc]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m0 0l-6-6m6 6l6-6" />
                        </svg>
                    </div>
                    <p class="text-gray-500 text-lg">Total Pemasukan</p>
                    <h3 class="text-3xl font-bold mt-3">Rp 2.000.000</h3>
                    <p class="text-green-500 font-medium mt-5">↑ 12% dari bulan lalu</p>
                </div>

                <div class="bg-white rounded-2xl p-7 shadow-lg shadow-gray-200/70">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 20V4m0 0l-6 6m6-6l6 6" />
                        </svg>
                    </div>
                    <p class="text-gray-500 text-lg">Total Pengeluaran</p>
                    <h3 class="text-3xl font-bold mt-3">Rp 1.500.000</h3>
                    <p class="text-red-500 font-medium mt-5">↓ 5% dari bulan lalu</p>
                </div>

                <div class="bg-white rounded-2xl p-7 shadow-lg shadow-gray-200/70">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-[#0061cc]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <rect x="2" y="5" width="20" height="14" rx="2" />
                            <line x1="2" y1="10" x2="22" y2="10" />
                        </svg>
                    </div>
                    <p class="text-gray-500 text-lg">Saldo Bersih</p>
                    <h3 class="text-3xl font-bold mt-3">Rp 500.000</h3>
                    <p class="text-[#0061cc] font-medium mt-5">Sisa budget bulan ini</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white rounded-2xl p-8 shadow-lg shadow-gray-200/70">
                    <h3 class="text-2xl font-bold">Pengeluaran per Kategori</h3>
                    <p class="text-gray-500 mt-2 mb-10">Distribusi pengeluaran bulan ini</p>

                    <div class="flex justify-center mb-10">
                        <div class="w-64 h-64 rounded-full relative"
                            style="background: conic-gradient(#f59e0b 0 40%, #2563eb 40% 70%, #22c55e 70% 85%, #06b6d4 85% 100%);">
                            <div class="absolute inset-16 bg-white rounded-full"></div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span><span class="inline-block w-3 h-3 bg-[#f59e0b] rounded-full mr-2"></span>Makanan & Minuman</span>
                            <span>40%</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span><span class="inline-block w-3 h-3 bg-[#2563eb] rounded-full mr-2"></span>Transportasi</span>
                            <span>30%</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span><span class="inline-block w-3 h-3 bg-[#22c55e] rounded-full mr-2"></span>Belanja</span>
                            <span>15%</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span><span class="inline-block w-3 h-3 bg-[#06b6d4] rounded-full mr-2"></span>Lainnya</span>
                            <span>15%</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-lg shadow-gray-200/70">
                    <h3 class="text-2xl font-bold">Progress Budget</h3>
                    <p class="text-gray-500 mt-2 mb-16">Penggunaan budget per kategori</p>

                    <div class="space-y-16">
                        <div>
                            <div class="flex justify-between mb-4 font-medium">
                                <span>Makanan & Minuman</span>
                                <span>24%</span>
                            </div>
                            <div class="w-full h-3 bg-gray-200 rounded-full">
                                <div class="h-3 bg-[#0061cc] rounded-full" style="width: 24%"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between mb-4 font-medium">
                                <span>Transportasi</span>
                                <span>14%</span>
                            </div>
                            <div class="w-full h-3 bg-gray-200 rounded-full">
                                <div class="h-3 bg-[#0061cc] rounded-full" style="width: 14%"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between mb-4 font-medium">
                                <span>Belanja</span>
                                <span>8%</span>
                            </div>
                            <div class="w-full h-3 bg-gray-200 rounded-full">
                                <div class="h-3 bg-[#0061cc] rounded-full" style="width: 8%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
</body>
</html>
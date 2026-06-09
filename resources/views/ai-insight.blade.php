<x-app-layout>
    <div class="px-10 py-12 max-w-7xl mx-auto">
        
        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-[#0061cc] rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-500/30">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-3xl font-bold tracking-tight text-[#0f172a]">AI Financial Insight</h2>
                    <p class="text-gray-500 text-sm mt-1">Analisis cerdas dan prediksi keuangan berdasarkan data Anda</p>
                </div>
            </div>
            <button onclick="refreshAnalysis()" id="btnRefresh" class="bg-white border border-gray-200 text-gray-700 px-5 py-2.5 rounded-xl text-sm font-semibold shadow-sm hover:bg-gray-50 transition-colors flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                Refresh Analisis
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm flex justify-between items-start hover:shadow-md transition-shadow">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Burn Rate (Rata-rata)</p>
                    <h4 id="val-burn-rate" class="text-2xl font-bold text-gray-800">Rp 0</h4>
                    <p class="text-xs text-gray-400 mt-1">pengeluaran per hari</p>
                </div>
                <div class="w-10 h-10 bg-blue-50 text-[#0061cc] rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" /></svg>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm flex justify-between items-start hover:shadow-md transition-shadow">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Prediksi Akhir Bulan</p>
                    <h4 id="val-prediksi" class="text-2xl font-bold text-gray-800">Rp 0</h4>
                    <p class="text-xs text-gray-400 mt-1">estimasi total pengeluaran</p>
                </div>
                <div class="w-10 h-10 bg-orange-50 text-orange-500 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm flex justify-between items-start hover:shadow-md transition-shadow">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Sisa Hari di Bulan Ini</p>
                    <h4 id="val-sisa-hari" class="text-2xl font-bold text-green-600">0 Hari</h4>
                    <p class="text-xs text-gray-400 mt-1">menuju bulan baru</p>
                </div>
                <div class="w-10 h-10 bg-green-50 text-green-500 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm flex justify-between items-start hover:shadow-md transition-shadow">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Rasio Tabungan</p>
                    <h4 id="val-rasio" class="text-2xl font-bold text-[#0061cc]">0%</h4>
                    <p class="text-xs text-gray-400 mt-1">dari total pemasukan</p>
                </div>
                <div class="w-10 h-10 bg-blue-50 text-[#0061cc] rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            
            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm flex flex-col justify-center">
                <div class="flex items-center gap-2 mb-6">
                    <svg class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                    <h3 class="text-lg font-bold text-gray-800">Arus Kas Bulan Ini</h3>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="p-4 bg-green-50 rounded-2xl border border-green-100">
                        <p class="text-xs text-gray-500 mb-1">Total Pemasukan</p>
                        <h4 id="val-pemasukan" class="text-xl font-bold text-green-600">Rp 0</h4>
                    </div>
                    <div class="p-4 bg-red-50 rounded-2xl border border-red-100">
                        <p class="text-xs text-gray-500 mb-1">Total Pengeluaran</p>
                        <h4 id="val-pengeluaran" class="text-xl font-bold text-red-600">Rp 0</h4>
                    </div>
                </div>

                <div class="p-5 bg-blue-50/50 rounded-2xl border border-blue-100 text-center">
                    <p class="text-sm text-gray-500 mb-1">Saldo Bersih (Tabungan)</p>
                    <h2 id="val-saldo" class="text-4xl font-black text-[#0061cc]">Rp 0</h2>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm max-h-[400px] overflow-y-auto">
                <div class="flex items-center gap-2 mb-6">
                    <svg class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                    <h3 class="text-lg font-bold text-gray-800">Kesehatan Budget</h3>
                </div>
                <p class="text-sm text-gray-500 mb-6">Status budget per kategori pengeluaran Anda</p>

                <div id="budget-health-container" class="space-y-5">
                    <p class="text-sm text-center text-gray-400 py-4 animate-pulse">Menghitung kesehatan budget...</p>
                </div>
            </div>
        </div>

    </div>

    @push('scripts')
    <script>
        const formatRupiah = (angka) => new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(angka || 0);

        function loadInsightData() {
            // Ambil semua data API secara bersamaan
            Promise.all([
                fetch('/api/dashboard-summary').then(res => res.json()),
                fetch('/api/categories').then(res => res.json()),
                fetch('/api/budgets').then(res => res.json())
            ])
            .then(([summaryData, catsData, budsData]) => {
                const summary = summaryData.data || {};
                const categories = catsData.data || [];
                const budgets = budsData.data || [];

                // 1. Hitung Arus Kas Dasar
                const income = summary.total_income || 0;
                const expense = summary.total_expense || 0;
                const saldo = income - expense;

                document.getElementById('val-pemasukan').innerText = formatRupiah(income);
                document.getElementById('val-pengeluaran').innerText = formatRupiah(expense);
                document.getElementById('val-saldo').innerText = formatRupiah(saldo);

                // 2. Hitung Prediksi & Rasio AI
                const today = new Date();
                const currentDay = today.getDate(); // Tanggal hari ini (misal tgl 15)
                const daysInMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0).getDate(); // Total hari bulan ini
                const remainingDays = daysInMonth - currentDay;

                // Burn Rate: Rata-rata pengeluaran per hari sejauh ini
                const burnRate = currentDay > 0 ? (expense / currentDay) : 0;
                // Prediksi: Jika kecepatan pengeluaran (burn rate) sama sampai akhir bulan
                const prediksiAkhirBulan = burnRate * daysInMonth;
                // Rasio Tabungan: Saldo / Pemasukan
                const rasio = income > 0 ? Math.round((saldo / income) * 100) : 0;

                document.getElementById('val-burn-rate').innerText = formatRupiah(burnRate);
                document.getElementById('val-prediksi').innerText = formatRupiah(prediksiAkhirBulan);
                document.getElementById('val-sisa-hari').innerText = `${remainingDays} Hari`;
                document.getElementById('val-rasio').innerText = `${rasio > 0 ? rasio : 0}%`;

                // 3. Render Kesehatan Budget Dinamis
                const healthContainer = document.getElementById('budget-health-container');
                healthContainer.innerHTML = '';
                const expensesByCat = summary.expenses_by_category || [];

                // Ambil hanya kategori yang tipenya pengeluaran
                const expenseCategories = categories.filter(c => (c.type || 'Pengeluaran') === 'Pengeluaran');

                let budgetCount = 0;

                expenseCategories.forEach(cat => {
                    // Cek apakah kategori ini punya limit budget
                    const budgetObj = budgets.find(b => b.category_id === cat.id);
                    const limit = budgetObj ? budgetObj.nominal_limit : 0;
                    
                    if (limit > 0) {
                        budgetCount++;
                        const expObj = expensesByCat.find(e => e.category === cat.name);
                        const spent = expObj ? expObj.total : 0;
                        const percent = Math.min(Math.round((spent / limit) * 100), 100);

                        // Tentukan Status (Sehat, Waspada, Bahaya)
                        let healthText = 'Sehat';
                        let healthColor = 'text-green-500 bg-green-50';
                        let barColor = 'bg-green-500';

                        if(percent >= 90) {
                            healthText = 'Bahaya';
                            healthColor = 'text-red-500 bg-red-50';
                            barColor = 'bg-red-500';
                        } else if (percent >= 75) {
                            healthText = 'Waspada';
                            healthColor = 'text-yellow-600 bg-yellow-50';
                            barColor = 'bg-yellow-400';
                        }

                        healthContainer.innerHTML += `
                            <div>
                                <div class="flex justify-between items-center mb-1">
                                    <div class="flex items-center gap-2">
                                        <div class="w-6 h-6 flex items-center justify-center bg-gray-50 border border-gray-100 rounded-md text-xs">${cat.icon || '🍔'}</div>
                                        <span class="text-sm font-semibold text-gray-700">${cat.name}</span>
                                    </div>
                                    <span class="text-[10px] font-bold ${healthColor} px-2 py-1 rounded-md uppercase tracking-wider">${healthText}</span>
                                </div>
                                <div class="w-full h-2 bg-gray-100 rounded-full overflow-hidden mt-2">
                                    <div class="h-full ${barColor} rounded-full transition-all duration-1000" style="width: ${percent}%"></div>
                                </div>
                                <div class="text-[10px] text-gray-400 mt-1.5 flex justify-between">
                                    <span>Terpakai: <strong>${formatRupiah(spent)}</strong></span>
                                    <span>Limit: ${formatRupiah(limit)}</span>
                                </div>
                            </div>
                        `;
                    }
                });

                // Pesan kosong jika user belum membuat budget
                if(budgetCount === 0) {
                    healthContainer.innerHTML = `
                        <div class="text-center py-6">
                            <span class="text-4xl">🎯</span>
                            <p class="text-sm text-gray-500 mt-3">Anda belum mengatur limit budget bulanan.</p>
                            <a href="/category" class="text-sm text-[#0061cc] font-semibold hover:underline mt-1 inline-block">Atur Budget Sekarang</a>
                        </div>
                    `;
                }
            })
            .catch(err => {
                console.error('Gagal mengambil data AI Insight:', err);
                alert('Terjadi kesalahan saat memuat analisis.');
            });
        }

        // Tombol Refresh Animasi
        function refreshAnalysis() {
            const btn = document.getElementById('btnRefresh');
            const originalText = btn.innerHTML;
            
            btn.innerHTML = `<svg class="animate-spin w-4 h-4 text-gray-600" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Menyinkronkan...`;
            btn.disabled = true;

            // Memuat ulang data dan mengembalikan tombol setelah 1 detik
            loadInsightData();
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
            }, 1000);
        }

        // Jalankan saat halaman dibuka
        document.addEventListener('DOMContentLoaded', loadInsightData);
    </script>
    @endpush
</x-app-layout>
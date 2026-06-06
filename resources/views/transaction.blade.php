<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DuitKu - Transaksi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f8fafc] font-sans text-[#0f172a]">
<div class="min-h-screen flex">

    <aside class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between">
        <div>
            <div class="px-6 py-8 flex items-center gap-4">
                <div class="w-12 h-12 bg-[#0061cc] rounded-2xl flex items-center justify-center shadow-sm">
                    <svg class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="5" width="20" height="14" rx="2"/>
                        <line x1="2" y1="10" x2="22" y2="10"/>
                        <circle cx="18" cy="14" r="1" fill="currentColor"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-[#0061cc] tracking-tight">DuitKu</h1>
            </div>

            <nav class="px-5 mt-6 space-y-4">
                <a href="/dashboard" class="flex items-center gap-4 px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-xl text-sm font-medium">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                    </svg>
                    Dashboard
                </a>

                <a href="/transactions" class="flex items-center gap-4 px-4 py-3 bg-[#0061cc] text-white rounded-xl text-sm font-semibold shadow-sm">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 14h6m-6-4h6m-7 10h8a2 2 0 002-2V6a2 2 0 00-2-2H8a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Transaksi
                </a>

                <a href="#" class="flex items-center gap-4 px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-xl text-sm font-medium">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 3a9 9 0 108.95 10H11V3z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 00-9-9v9h9z"/>
                    </svg>
                    Kategori
                </a>

                <a href="#" class="flex items-center gap-4 px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-xl text-sm font-medium">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    AI Quick Input
                </a>

                <a href="#" class="flex items-center gap-4 px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-xl text-sm font-medium">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 19V9m5 10V5m5 14v-7m5 7V3"/>
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
                    <p class="text-sm font-semibold text-gray-800">Mei Sari</p>
                    <p class="text-xs text-gray-500">User</p>
                </div>
            </div>

            <button class="w-full flex items-center justify-center gap-2 border border-gray-300 rounded-xl py-3 text-sm font-medium text-gray-700 hover:bg-gray-100">
                Keluar
            </button>
        </div>
    </aside>

    <main class="flex-1 px-10 py-12">

        <div class="flex justify-between items-start mb-10">
            <div>
                <h2 class="text-4xl font-bold tracking-tight text-[#0f172a]">Transaksi</h2>
                <p class="text-gray-500 mt-2 text-lg">Kelola semua transaksi keuangan Anda</p>
            </div>

            <button onclick="openModal()" class="mt-8 bg-[#0061cc] text-white px-5 py-3 rounded-xl text-sm font-semibold shadow-sm hover:bg-[#0052ad]">
                + Tambah Transaksi
            </button>
        </div>

    <!-- SEARCH CARD -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-xl shadow-gray-200/50 p-5 mb-8">
        <div class="flex items-center gap-4">

            <div class="flex-1">
                <div class="w-full h-12 bg-[#f5f5f7] border border-gray-200 rounded-xl px-4 flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 text-gray-400 flex-shrink-0"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z" />
                    </svg>

                    <input
                        type="text"
                        placeholder="Cari transaksi..."
                        class="flex-1 bg-transparent border-0 p-0 text-sm text-gray-700 placeholder-gray-400 focus:ring-0 outline-none"
                    >
                </div>
            </div>

            <select
                class="w-44 h-12 bg-[#f5f5f7] border border-gray-200 rounded-xl px-4 text-sm text-gray-700 focus:ring-2 focus:ring-[#0061cc] focus:border-transparent outline-none">
                <option>Semua</option>
                <option>Pemasukan</option>
                <option>Pengeluaran</option>
            </select>

        </div>
    </div>

        <!-- TABLE CARD -->
        <div class="bg-white rounded-2xl shadow-xl shadow-gray-300/50 p-6 mt-8">
            <h3 class="text-2xl font-bold text-[#0f172a]">Daftar Transaksi</h3>
            <p class="text-gray-500 mt-1 mb-6">12 transaksi ditemukan</p>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left text-black-500 border-b border-gray-200">
                            <th class="py-4 px-4">Tanggal</th>
                            <th class="py-4 px-4">Deskripsi</th>
                            <th class="py-4 px-4">Kategori</th>
                            <th class="py-4 px-4">Tipe</th>
                            <th class="py-4 px-4 text-right">Jumlah</th>
                            <th class="py-4 px-4 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody id="transactionTable" class="divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50">
                            <td class="py-5 px-4 text-gray-600">15 Maret 2024</td>
                            <td class="py-5 px-4 font-medium">Makan siang di kampus</td>
                            <td class="py-5 px-4 text-gray-600">Makanan & Minuman</td>
                            <td class="py-5 px-4"><span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-xs font-semibold">Pengeluaran</span></td>
                            <td class="py-5 px-4 text-right text-red-600 font-semibold">-Rp 15.000</td>
                            <td class="py-5 px-4 text-center">✏️ 🗑️</td>
                        </tr>

                        <tr class="hover:bg-gray-50">
                            <td class="py-5 px-4 text-gray-600">15 Maret 2024</td>
                            <td class="py-5 px-4 font-medium">Uang jatah bulanan</td>
                            <td class="py-5 px-4 text-gray-600">Pemasukan</td>
                            <td class="py-5 px-4"><span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-xs font-semibold">Pemasukan</span></td>
                            <td class="py-5 px-4 text-right text-green-600 font-semibold">+Rp 2.000.000</td>
                            <td class="py-5 px-4 text-center">✏️ 🗑️</td>
                        </tr>

                        <tr class="hover:bg-gray-50">
                            <td class="py-5 px-4 text-gray-600">14 Maret 2024</td>
                            <td class="py-5 px-4 font-medium">Belanja bulanan supermarket</td>
                            <td class="py-5 px-4 text-gray-600">Belanja</td>
                            <td class="py-5 px-4"><span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-xs font-semibold">Pengeluaran</span></td>
                            <td class="py-5 px-4 text-right text-red-600 font-semibold">-Rp 250.000</td>
                            <td class="py-5 px-4 text-center">✏️ 🗑️</td>
                        </tr>

                        <tr class="hover:bg-gray-50">
                            <td class="py-5 px-4 text-gray-600">13 Maret 2024</td>
                            <td class="py-5 px-4 font-medium">Freelance design UI</td>
                            <td class="py-5 px-4 text-gray-600">Pemasukan</td>
                            <td class="py-5 px-4"><span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-xs font-semibold">Pemasukan</span></td>
                            <td class="py-5 px-4 text-right text-green-600 font-semibold">+Rp 150.000</td>
                            <td class="py-5 px-4 text-center">✏️ 🗑️</td>
                        </tr>

                        <tr class="hover:bg-gray-50">
                            <td class="py-5 px-4 text-gray-600">12 Maret 2024</td>
                            <td class="py-5 px-4 font-medium">Bayar listrik</td>
                            <td class="py-5 px-4 text-gray-600">Tagihan</td>
                            <td class="py-5 px-4"><span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-xs font-semibold">Pengeluaran</span></td>
                            <td class="py-5 px-4 text-right text-red-600 font-semibold">-Rp 50.000</td>
                            <td class="py-5 px-4 text-center">✏️ 🗑️</td>
                        </tr>

                        <tr class="hover:bg-gray-50">
                            <td class="py-5 px-4 text-gray-600">12 Maret 2024</td>
                            <td class="py-5 px-4 font-medium">Gaji freelance</td>
                            <td class="py-5 px-4 text-gray-600">Pemasukan</td>
                            <td class="py-5 px-4"><span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-xs font-semibold">Pemasukan</span></td>
                            <td class="py-5 px-4 text-right text-green-600 font-semibold">+Rp 750.000</td>
                            <td class="py-5 px-4 text-center">✏️ 🗑️</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<!-- MODAL TAMBAH TRANSAKSI -->
<div id="modal" class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">
    <div class="bg-white w-full max-w-lg rounded-3xl p-8 border border-slate-200 shadow-xl">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold">Tambah Transaksi</h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
        </div>

        <div class="space-y-4">
            <input id="tanggal" type="text" placeholder="Tanggal, contoh: 16 Maret 2024"
            class="w-full bg-white border border-gray-300 rounded-xl py-3 px-4 text-sm shadow-sm focus:ring-2 focus:ring-[#0061cc] focus:border-[#0061cc]">

            <input id="deskripsi" type="text" placeholder="Deskripsi"
            class="w-full bg-white border border-gray-300 rounded-xl py-3 px-4 text-sm shadow-sm focus:ring-2 focus:ring-[#0061cc] focus:border-[#0061cc]">

            <input id="kategori" type="text" placeholder="Kategori"
            class="w-full bg-white border border-gray-300 rounded-xl py-3 px-4 text-sm shadow-sm focus:ring-2 focus:ring-[#0061cc] focus:border-[#0061cc]">

            <select id="tipe" class="w-full bg-white border border-gray-300 rounded-xl py-3 px-4 text-sm shadow-sm focus:ring-2 focus:ring-[#0061cc] focus:border-[#0061cc]">
                <option value="Pengeluaran">Pengeluaran</option>
                <option value="Pemasukan">Pemasukan</option>
            </select>

            <input id="jumlah" type="number" placeholder="Jumlah, contoh: 100000"
            class="w-full bg-white border border-gray-300 rounded-xl py-3 px-4 text-sm shadow-sm focus:ring-2 focus:ring-[#0061cc] focus:border-[#0061cc]">
        </div>

        <div class="flex justify-end gap-3 mt-6">
            <button onclick="closeModal()" class="px-5 py-3 border border-gray-300 rounded-xl text-sm font-medium">
                Batal
            </button>
            <button onclick="addTransaction()" class="px-5 py-3 bg-[#0061cc] text-white rounded-xl text-sm font-semibold">
                Simpan
            </button>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('modal').classList.remove('hidden');
        document.getElementById('modal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
        document.getElementById('modal').classList.remove('flex');
    }

    function addTransaction() {
        const tanggal = document.getElementById('tanggal').value;
        const deskripsi = document.getElementById('deskripsi').value;
        const kategori = document.getElementById('kategori').value;
        const tipe = document.getElementById('tipe').value;
        const jumlah = document.getElementById('jumlah').value;

        if (!tanggal || !deskripsi || !kategori || !jumlah) {
            alert('Semua field harus diisi.');
            return;
        }

        const isIncome = tipe === 'Pemasukan';
        const badgeClass = isIncome ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600';
        const amountClass = isIncome ? 'text-green-600' : 'text-red-600';
        const prefix = isIncome ? '+Rp ' : '-Rp ';
        const formattedJumlah = Number(jumlah).toLocaleString('id-ID');

        const row = `
            <tr class="hover:bg-gray-50">
                <td class="py-5 px-4 text-gray-600">${tanggal}</td>
                <td class="py-5 px-4 font-medium">${deskripsi}</td>
                <td class="py-5 px-4 text-gray-600">${kategori}</td>
                <td class="py-5 px-4">
                    <span class="px-3 py-1 ${badgeClass} rounded-full text-xs font-semibold">${tipe}</span>
                </td>
                <td class="py-5 px-4 text-right ${amountClass} font-semibold">${prefix}${formattedJumlah}</td>
                <td class="py-5 px-4 text-center">✏️ 🗑️</td>
            </tr>
        `;

        document.getElementById('transactionTable').insertAdjacentHTML('afterbegin', row);
        closeModal();

        document.getElementById('tanggal').value = '';
        document.getElementById('deskripsi').value = '';
        document.getElementById('kategori').value = '';
        document.getElementById('jumlah').value = '';
    }
</script>

</body>
</html>
<x-app-layout>
    
    <div class="px-10 py-12">
        <div class="flex justify-between items-start mb-10">
            <div>
                <h2 class="text-4xl font-bold tracking-tight text-[#0f172a]">Transaksi</h2>
                <p class="text-gray-500 mt-2 text-lg">Kelola semua transaksi keuangan Anda</p>
            </div>

            <button onclick="openModal()" class="mt-8 bg-[#0061cc] text-white px-5 py-3 rounded-xl text-sm font-semibold shadow-sm hover:bg-[#0052ad] transition-colors">
                + Tambah Transaksi
            </button>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 shadow-xl shadow-gray-200/50 p-5 mb-8">
            <div class="flex items-center gap-4">
                <div class="flex-1">
                    <div class="w-full h-12 bg-[#f5f5f7] border border-gray-200 rounded-xl px-4 flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z" />
                        </svg>
                        <input type="text" placeholder="Cari transaksi..." class="flex-1 bg-transparent border-0 p-0 text-sm text-gray-700 placeholder-gray-400 focus:ring-0 outline-none">
                    </div>
                </div>
                <select class="w-44 h-12 bg-[#f5f5f7] border border-gray-200 rounded-xl px-4 text-sm text-gray-700 focus:ring-2 focus:ring-[#0061cc] focus:border-transparent outline-none">
                    <option>Semua</option>
                    <option>Pemasukan</option>
                    <option>Pengeluaran</option>
                </select>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl shadow-gray-300/50 p-6 mt-8">
            <h3 class="text-2xl font-bold text-[#0f172a]">Daftar Transaksi</h3>
            <p id="transaction-count" class="text-gray-500 mt-1 mb-6">Memuat data...</p>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left text-gray-500 border-b border-gray-200">
                            <th class="py-4 px-4 font-semibold">Tanggal</th>
                            <th class="py-4 px-4 font-semibold">Deskripsi</th>
                            <th class="py-4 px-4 font-semibold">Kategori</th>
                            <th class="py-4 px-4 font-semibold">Tipe</th>
                            <th class="py-4 px-4 text-right font-semibold">Jumlah</th>
                            <th class="py-4 px-4 text-center font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody id="transactionTable" class="divide-y divide-gray-200">
                        <tr>
                            <td colspan="6" class="py-10 text-center text-gray-400 animate-pulse">Mengambil data dari server...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="modal" class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50 transition-opacity">
        <div class="bg-white w-full max-w-lg rounded-3xl p-8 border border-slate-200 shadow-xl relative">
            
            <button onclick="closeModal()" class="absolute top-6 right-6 text-gray-400 hover:text-red-500 text-3xl leading-none">&times;</button>
            
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Tambah Transaksi</h3>

            <form id="formTransaksi" onsubmit="addTransaction(event)" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi/Catatan</label>
                    <input id="deskripsi" type="text" placeholder="Contoh: Beli makan siang" required class="w-full bg-white border border-gray-300 rounded-xl py-3 px-4 text-sm shadow-sm focus:ring-2 focus:ring-[#0061cc] outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select id="kategori" required class="w-full bg-white border border-gray-300 rounded-xl py-3 px-4 text-sm shadow-sm focus:ring-2 focus:ring-[#0061cc] outline-none">
                        <option value="" disabled selected>Memuat kategori...</option>
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tipe Transaksi</label>
                        <select id="tipe" class="w-full bg-white border border-gray-300 rounded-xl py-3 px-4 text-sm shadow-sm focus:ring-2 focus:ring-[#0061cc] outline-none">
                            <option value="pengeluaran">Pengeluaran</option>
                            <option value="pemasukan">Pemasukan</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah (Rp)</label>
                        <input id="jumlah" type="number" placeholder="Contoh: 50000" required class="w-full bg-white border border-gray-300 rounded-xl py-3 px-4 text-sm shadow-sm focus:ring-2 focus:ring-[#0061cc] outline-none">
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-8 pt-4">
                    <button type="button" onclick="closeModal()" class="px-5 py-3 border border-gray-300 rounded-xl text-sm font-medium text-gray-700 hover:bg-gray-50">
                        Batal
                    </button>
                    <button type="submit" id="btnSimpan" class="px-5 py-3 bg-[#0061cc] text-white rounded-xl text-sm font-semibold hover:bg-[#0052ad] transition-colors">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        // Utilities
        const formatRupiah = (angka) => new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(angka);
        
        const formatDate = (dateString) => {
            const options = { day: 'numeric', month: 'long', year: 'numeric' };
            return new Date(dateString).toLocaleDateString('id-ID', options);
        };

        // Modal Handlers
        function openModal() {
            document.getElementById('modal').classList.remove('hidden');
            document.getElementById('modal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
            document.getElementById('modal').classList.remove('flex');
            document.getElementById('formTransaksi').reset();
        }

        // FUNGSI BARU: MENGAMBIL DATA KATEGORI
        function loadCategories() {
            fetch('/api/categories', {
                headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(data => {
                if(data.status === 'success') {
                    const select = document.getElementById('kategori');
                    const categories = data.data || [];
                    
                    // Reset isi dropdown
                    select.innerHTML = '<option value="" disabled selected>Pilih Kategori...</option>';
                    
                    if(categories.length === 0) {
                        select.innerHTML += '<option value="" disabled>Belum ada kategori, buat di menu Kategori</option>';
                        return;
                    }

                    // Looping data kategori ke dalam elemen <option>
                    categories.forEach(cat => {
                        const icon = cat.icon ? cat.icon : '🍔';
                        select.innerHTML += `<option value="${cat.name}">${icon} ${cat.name}</option>`;
                    });
                }
            })
            .catch(err => console.error('Gagal mengambil kategori:', err));
        }

        // LOAD DATA TRANSAKSI DARI BACKEND
        function loadTransactions() {
            fetch('/api/transactions', {
                headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(data => {
                if(data.status === 'success') {
                    const transactions = data.data.data; 
                    const table = document.getElementById('transactionTable');
                    
                    document.getElementById('transaction-count').innerText = `${data.data.total} transaksi ditemukan`;
                    table.innerHTML = '';

                    if(transactions.length === 0) {
                        table.innerHTML = '<tr><td colspan="6" class="py-8 text-center text-gray-400">Belum ada transaksi.</td></tr>';
                        return;
                    }

                    transactions.forEach(trx => {
                        const isIncome = trx.type === 'pemasukan';
                        const badgeClass = isIncome ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600';
                        const amountColor = isIncome ? 'text-green-600' : 'text-red-600';
                        const prefix = isIncome ? '+' : '-';
                        const displayType = isIncome ? 'Pemasukan' : 'Pengeluaran';

                        table.innerHTML += `
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-4 px-4 text-gray-600">${formatDate(trx.created_at)}</td>
                                <td class="py-4 px-4 font-medium text-gray-800">${trx.notes || '-'}</td>
                                <td class="py-4 px-4 text-gray-600">${trx.category}</td>
                                <td class="py-4 px-4">
                                    <span class="px-3 py-1 ${badgeClass} rounded-full text-xs font-semibold">${displayType}</span>
                                </td>
                                <td class="py-4 px-4 text-right ${amountColor} font-semibold">${prefix}${formatRupiah(trx.amount)}</td>
                                <td class="py-4 px-4 text-center">
                                    <button onclick="deleteTransaction(${trx.id})" class="text-red-400 hover:text-red-600 p-1" title="Hapus">🗑️</button>
                                </td>
                            </tr>
                        `;
                    });
                }
            });
        }

        // TAMBAH DATA KE BACKEND
        function addTransaction(e) {
            e.preventDefault(); 
            const btn = document.getElementById('btnSimpan');
            btn.innerText = 'Menyimpan...';
            btn.disabled = true;

            const payload = {
                type: document.getElementById('tipe').value,
                amount: document.getElementById('jumlah').value,
                category: document.getElementById('kategori').value,
                notes: document.getElementById('deskripsi').value
            };

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('/api/transactions', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(payload)
            })
            .then(res => res.json())
            .then(data => {
                if(data.status === 'success') {
                    closeModal();
                    loadTransactions(); // Otomatis refresh tabel 
                } else {
                    alert('Gagal menyimpan: ' + (data.message || 'Cek kembali isian Anda.'));
                }
            })
            .finally(() => {
                btn.innerText = 'Simpan Data';
                btn.disabled = false;
            });
        }

        // HAPUS TRANSAKSI
        function deleteTransaction(id) {
            if(!confirm('Yakin ingin menghapus transaksi ini?')) return;

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            fetch(`/api/transactions/${id}`, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(res => res.json())
            .then(data => {
                if(data.status === 'success') {
                    loadTransactions(); 
                }
            });
        }

        // JALANKAN SAAT HALAMAN DIMUAT
        document.addEventListener('DOMContentLoaded', () => {
            loadTransactions();
            loadCategories(); // Panggil fungsi load kategori
        });
    </script>
    @endpush
</x-app-layout>
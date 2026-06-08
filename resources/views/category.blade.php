<x-app-layout>
    <div class="px-10 py-12 max-w-7xl mx-auto">
        
        <div class="flex justify-between items-start mb-8">
            <div>
                <h2 class="text-4xl font-bold tracking-tight text-[#0f172a]">Kategori</h2>
                <p class="text-gray-500 mt-2 text-lg">Kelola kategori dan budget pengeluaran Anda</p>
            </div>
            <button onclick="openCategoryModal()" class="bg-[#0061cc] text-white px-5 py-3 rounded-xl text-sm font-semibold shadow-sm hover:bg-[#0052ad] transition-colors flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m0 0l-6-6m6 6l6-6" /></svg>
                Tambah Kategori
            </button>
        </div>

        <div class="flex space-x-3 mb-8">
            <button id="btnTabPengeluaran" onclick="switchTab('Pengeluaran')" class="px-6 py-2.5 bg-white border border-[#0061cc] text-[#0061cc] font-semibold rounded-xl shadow-sm flex items-center gap-2 transition-all">
                <span id="iconTabPengeluaran" class="text-[#0061cc]">↙</span> Pengeluaran (<span id="countPengeluaran">0</span>)
            </button>
            <button id="btnTabPemasukan" onclick="switchTab('Pemasukan')" class="px-6 py-2.5 bg-white border border-gray-200 text-gray-500 font-medium rounded-xl hover:bg-gray-50 transition-all flex items-center gap-2">
                <span id="iconTabPemasukan" class="text-gray-400">↗</span> Pemasukan (<span id="countPemasukan">0</span>)
            </button>
        </div>

        <div id="category-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            <div class="col-span-full py-16 text-center text-gray-400 animate-pulse">Menyinkronkan data...</div>
        </div>

        <div class="bg-[#0061cc] rounded-3xl p-8 text-white shadow-xl relative overflow-hidden">
            <div class="relative z-10 max-w-2xl">
                <span class="inline-flex items-center gap-2 px-3 py-1 bg-white/20 rounded-full text-xs font-bold mb-4 backdrop-blur-sm">✨ AI INSIGHT</span>
                <h3 class="text-2xl font-bold mb-2">Tips Hemat Bulan Ini!</h3>
                <p id="ai-insight-text" class="text-blue-100 text-sm leading-relaxed mb-6">Menganalisa data...</p>
                <button class="bg-white text-[#0061cc] px-5 py-2.5 rounded-xl text-sm font-bold shadow-sm hover:bg-gray-50 transition-colors">
                    Lihat Analisa Lengkap
                </button>
            </div>
            <svg class="absolute right-0 bottom-0 text-white opacity-20 w-72 h-72 -mb-10 -mr-10" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
            </svg>
        </div>
    </div>

    <div id="modalCategory" class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50 transition-opacity">
        <div class="bg-white w-full max-w-md rounded-3xl p-8 shadow-2xl relative">
            <button onclick="closeCategoryModal()" class="absolute top-6 right-6 text-gray-400 hover:text-gray-700 text-2xl leading-none">&times;</button>
            <h3 class="text-2xl font-bold text-gray-800">Tambah Kategori Baru</h3>
            <p class="text-sm text-gray-500 mb-6">Buat kategori baru untuk mengorganisir transaksi Anda</p>
            
            <form id="formKategori" onsubmit="saveCategoryWithBudget(event)" class="space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Ikon</label>
                    <div class="grid grid-cols-7 gap-2 max-h-32 overflow-y-auto p-1" id="iconContainer"></div>
                    <input type="hidden" id="selectedIcon" value="🍔">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
                    <input id="catName" type="text" placeholder="Contoh: Makanan & Minuman" required class="w-full border border-gray-300 rounded-xl py-3 px-4 text-sm outline-none focus:ring-2 focus:ring-[#0061cc]">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tipe</label>
                    <select id="catType" class="w-full border border-gray-300 rounded-xl py-3 px-4 text-sm outline-none focus:ring-2 focus:ring-[#0061cc]">
                        <option value="Pengeluaran">Pengeluaran</option>
                        <option value="Pemasukan">Pemasukan</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Budget Bulanan (Rp)</label>
                    <input id="catBudget" type="number" placeholder="Kosongkan jika pemasukan" class="w-full border border-gray-300 rounded-xl py-3 px-4 text-sm outline-none focus:ring-2 focus:ring-[#0061cc]">
                </div>

                <div class="flex justify-end gap-3 mt-8">
                    <button type="button" onclick="closeCategoryModal()" class="px-6 py-2.5 border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50">Batal</button>
                    <button type="submit" id="btnSimpanCat" class="px-6 py-2.5 bg-[#0061cc] text-white rounded-xl text-sm font-semibold hover:bg-[#0052ad] shadow-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        const formatRupiah = (angka) => new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(angka || 0);
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // State untuk Tab Aktif
        let currentTabFilter = 'Pengeluaran';

        const emojis = ['🍔', '☕', '🍱', '🍩', '🍕', '🍰', '🚗', '🛵', '🚆', '⛽', '🚌', '🚕', '🛒', '🛍️', '👕', '📱', '👟', '💻', '📄', '⚡', '💧', '🏠', '🔑', '🛠️', '🎮', '🎬', '✈️', '🎨', '🎵', '📚', '💊', '🏥', '💰', '🎓', '🎁', '🐶'];
        const iconContainer = document.getElementById('iconContainer');
        
        emojis.forEach((emoji, index) => {
            const isSelected = index === 0 ? 'bg-blue-100 ring-2 ring-[#0061cc]' : 'hover:bg-gray-100';
            iconContainer.innerHTML += `<button type="button" onclick="selectIcon('${emoji}', this)" class="icon-btn w-10 h-10 flex items-center justify-center text-xl rounded-xl transition-all ${isSelected}">${emoji}</button>`;
        });

        function selectIcon(emoji, btnElement) {
            document.getElementById('selectedIcon').value = emoji;
            document.querySelectorAll('.icon-btn').forEach(btn => {
                btn.classList.remove('bg-blue-100', 'ring-2', 'ring-[#0061cc]');
                btn.classList.add('hover:bg-gray-100');
            });
            btnElement.classList.remove('hover:bg-gray-100');
            btnElement.classList.add('bg-blue-100', 'ring-2', 'ring-[#0061cc]');
        }

        function openCategoryModal() {
            document.getElementById('modalCategory').classList.remove('hidden');
            document.getElementById('modalCategory').classList.add('flex');
            // Set tipe select di form sama dengan tab yang sedang aktif
            document.getElementById('catType').value = currentTabFilter;
        }

        function closeCategoryModal() {
            document.getElementById('modalCategory').classList.add('hidden');
            document.getElementById('modalCategory').classList.remove('flex');
            document.getElementById('formKategori').reset();
            selectIcon('🍔', document.querySelector('.icon-btn')); 
        }

        // FUNGSI GANTI TAB PENGELUARAN / PEMASUKAN
        function switchTab(type) {
            currentTabFilter = type;
            const btnPengeluaran = document.getElementById('btnTabPengeluaran');
            const btnPemasukan = document.getElementById('btnTabPemasukan');
            
            // Ubah Warna Tombol Tab
            if(type === 'Pengeluaran') {
                btnPengeluaran.className = "px-6 py-2.5 bg-white border border-[#0061cc] text-[#0061cc] font-semibold rounded-xl shadow-sm flex items-center gap-2 transition-all";
                document.getElementById('iconTabPengeluaran').className = "text-[#0061cc]";
                
                btnPemasukan.className = "px-6 py-2.5 bg-white border border-gray-200 text-gray-500 font-medium rounded-xl hover:bg-gray-50 transition-all flex items-center gap-2";
                document.getElementById('iconTabPemasukan').className = "text-gray-400";
            } else {
                btnPemasukan.className = "px-6 py-2.5 bg-white border border-[#0061cc] text-[#0061cc] font-semibold rounded-xl shadow-sm flex items-center gap-2 transition-all";
                document.getElementById('iconTabPemasukan').className = "text-[#0061cc]";
                
                btnPengeluaran.className = "px-6 py-2.5 bg-white border border-gray-200 text-gray-500 font-medium rounded-xl hover:bg-gray-50 transition-all flex items-center gap-2";
                document.getElementById('iconTabPengeluaran').className = "text-gray-400";
            }
            
            loadCategoriesAndBudgets(); // Panggil ulang data
        }

        // RENDER DATA
        function loadCategoriesAndBudgets() {
            Promise.all([
                fetch('/api/categories').then(res => res.json()),
                fetch('/api/budgets').then(res => res.json()),
                fetch('/api/dashboard-summary').then(res => res.json())
            ])
            .then(([cats, buds, summ]) => {
                const grid = document.getElementById('category-grid');
                grid.innerHTML = '';
                
                const allCategories = cats.data || [];
                const expenses = summ.data ? summ.data.expenses_by_category : [];
                let maxWarning = { cat: '', percent: 0 };

                // Hitung total tab
                const totalPengeluaran = allCategories.filter(c => (c.type || 'Pengeluaran') === 'Pengeluaran').length;
                const totalPemasukan = allCategories.filter(c => c.type === 'Pemasukan').length;
                document.getElementById('countPengeluaran').innerText = totalPengeluaran;
                document.getElementById('countPemasukan').innerText = totalPemasukan;

                // FILTER kategori berdasarkan Tab Aktif
                const filteredCategories = allCategories.filter(c => (c.type || 'Pengeluaran') === currentTabFilter);

                if (filteredCategories.length === 0) {
                    grid.innerHTML = `<div class="col-span-full py-10 text-center text-gray-400">Belum ada kategori ${currentTabFilter}.</div>`;
                }

                filteredCategories.forEach(cat => {
                    const budget = (buds.data || []).find(b => b.category_id === cat.id);
                    const expense = expenses.find(e => e.category === cat.name);
                    const spent = expense ? expense.total : 0;
                    const limit = budget ? budget.nominal_limit : 0;
                    const percent = limit > 0 ? Math.min(Math.round((spent / limit) * 100), 100) : 0;
                    
                    if(percent > maxWarning.percent) maxWarning = { cat: cat.name, percent: percent };
                    const displayIcon = cat.icon ? cat.icon : '🍔';

                    // Jika ini tab Pemasukan, sembunyikan bar budget
                    const isIncome = currentTabFilter === 'Pemasukan';
                    const budgetHtml = isIncome ? `<p class="text-sm font-medium text-green-500 mt-2">Kategori Pemasukan</p>` : `
                        <div class="space-y-2">
                            <div class="flex justify-between text-xs font-bold text-gray-500">
                                <span>Penggunaan Budget</span>
                                <span class="${percent >= 90 ? 'text-red-500' : 'text-[#0061cc]'}">${percent}%</span>
                            </div>
                            <div class="w-full h-2 bg-gray-100 rounded-full overflow-hidden">
                                <div class="h-full ${percent >= 90 ? 'bg-red-500' : (percent >= 75 ? 'bg-yellow-500' : 'bg-[#0061cc]')} rounded-full transition-all duration-1000" style="width: ${percent}%"></div>
                            </div>
                        </div>
                    `;

                    grid.innerHTML += `
                        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
                            <div>
                                <div class="flex justify-between items-start mb-6">
                                    <div class="w-12 h-12 rounded-2xl bg-gray-50 flex items-center justify-center text-2xl border border-gray-100 shadow-sm">
                                        ${displayIcon}
                                    </div>
                                    <button onclick="deleteCategory(${cat.id})" class="text-gray-300 hover:text-red-500 transition-colors" title="Hapus Kategori">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                    </button>
                                </div>
                                <h4 class="font-bold text-gray-800 text-lg">${cat.name}</h4>
                                <p class="text-xs text-gray-400 mb-4">Kustom Kategori</p>
                                ${budgetHtml}
                            </div>
                            <div class="mt-6 pt-4 border-t border-gray-50 flex justify-between items-end">
                                <div class="text-xl font-bold text-gray-800">${formatRupiah(spent)}</div>
                                <div class="text-[10px] text-gray-400 font-medium">${!isIncome && limit > 0 ? 'dari ' + formatRupiah(limit) : ''}</div>
                            </div>
                        </div>
                    `;
                });

                // Update AI Insight
                const insightText = document.getElementById('ai-insight-text');
                if(maxWarning.percent >= 75) {
                    insightText.innerText = `Pengeluaran kategori ${maxWarning.cat} sudah mencapai ${maxWarning.percent}% dari budget. Hindari pembelian barang sekunder hingga akhir bulan.`;
                } else {
                    insightText.innerText = "Kondisi keuangan Anda bulan ini sangat sehat! Semua kategori masih berada jauh di bawah batas budget yang Anda tetapkan.";
                }
            });
        }
        document.addEventListener('DOMContentLoaded', loadCategoriesAndBudgets);

        function saveCategoryWithBudget(e) {
            e.preventDefault();
            const btn = document.getElementById('btnSimpanCat');
            btn.innerText = 'Menyimpan...';
            btn.disabled = true;

            const payload = {
                name: document.getElementById('catName').value,
                icon: document.getElementById('selectedIcon').value,
                type: document.getElementById('catType').value // KINI TYPE DIAMBIL DARI FORM
            };
            const limit = document.getElementById('catBudget').value;

            fetch('/api/categories', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                body: JSON.stringify(payload)
            })
            .then(res => res.json())
            .then(data => {
                if(data.status === 'success' && limit && payload.type === 'Pengeluaran') {
                    return fetch('/api/budgets', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                        body: JSON.stringify({ category_id: data.data.id, nominal_limit: limit })
                    });
                }
            })
            .then(() => {
                closeCategoryModal();
                loadCategoriesAndBudgets();
            })
            .catch(err => alert("Terjadi kesalahan."))
            .finally(() => {
                btn.innerText = 'Simpan';
                btn.disabled = false;
            });
        }

        function deleteCategory(id) {
            if(!confirm('Yakin menghapus kategori ini?')) return;
            fetch(`/api/categories/${id}`, {
                method: 'DELETE',
                headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': csrfToken }
            }).then(() => loadCategoriesAndBudgets());
        }
    </script>
    @endpush
</x-app-layout>
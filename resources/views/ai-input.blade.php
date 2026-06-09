<x-app-layout>
    <div class="px-10 py-12 max-w-4xl mx-auto">
        
        <div class="flex flex-col items-center justify-center text-center mb-10">
            <div class="w-16 h-16 bg-blue-50 rounded-3xl flex items-center justify-center mb-6 text-[#0061cc] shadow-sm border border-blue-100/50">
                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                </svg>
            </div>
            <h2 class="text-4xl font-bold tracking-tight text-[#0f172a] mb-3">AI Quick Input</h2>
            <p class="text-gray-500 text-lg">Catat transaksi dengan bahasa natural, AI akan memproses otomatis</p>
        </div>

        <div class="bg-white rounded-3xl border border-gray-100 shadow-xl shadow-gray-200/40 p-8 mb-10 relative overflow-hidden">
            <h3 class="text-xl font-bold text-gray-800 mb-1">Masukkan Transaksi</h3>
            <p class="text-sm text-gray-500 mb-6">Ketik transaksi Anda dengan bahasa sehari-hari</p>

            <form id="aiForm" onsubmit="processAiInput(event)">
                <textarea id="aiPrompt" rows="4" required
                    placeholder="Contoh: Beli kopi di Starbucks 75rb..." 
                    class="w-full bg-gray-50/50 border border-gray-200 rounded-2xl p-5 text-gray-700 text-base focus:ring-2 focus:ring-[#0061cc] focus:bg-white outline-none resize-none transition-all"></textarea>
                
                <div class="flex flex-wrap items-center justify-between gap-4 mt-6">
                    <div class="flex flex-wrap gap-2">
                        <button type="button" onclick="fillPrompt('Beli kopi di Starbucks 75rb')" class="px-4 py-2 bg-gray-100 text-gray-600 rounded-full text-xs font-medium hover:bg-gray-200 transition-colors">
                            Beli kopi di Starbucks 75rb
                        </button>
                        <button type="button" onclick="fillPrompt('Makan siang di warteg 25.000')" class="px-4 py-2 bg-gray-100 text-gray-600 rounded-full text-xs font-medium hover:bg-gray-200 transition-colors">
                            Makan siang di warteg 25.000
                        </button>
                        <button type="button" onclick="fillPrompt('Terima gaji bulan ini 12 juta')" class="px-4 py-2 bg-gray-100 text-gray-600 rounded-full text-xs font-medium hover:bg-gray-200 transition-colors">
                            Terima gaji bulan ini 12 juta
                        </button>
                    </div>

                    <button type="submit" id="btnProses" class="px-8 py-3 bg-[#0061cc] text-white rounded-xl text-sm font-bold shadow-sm hover:bg-[#0052ad] transition-all flex items-center gap-2 shrink-0">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                        Proses
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-white rounded-3xl border border-gray-100 shadow-xl shadow-gray-200/40 p-8">
            <div class="flex items-center gap-3 mb-6">
                <svg class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="text-xl font-bold text-gray-800">Riwayat Quick Input</h3>
            </div>
            <p class="text-sm text-gray-500 mb-6">Transaksi yang baru saja Anda catat menggunakan AI</p>

            <div id="aiHistoryList" class="space-y-3">
                <div class="py-10 text-center text-gray-400 animate-pulse">Memuat riwayat transaksi...</div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        const formatRupiah = (angka) => new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(angka || 0);
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Fungsi untuk mengisi text area saat chip di-klik
        function fillPrompt(text) {
            document.getElementById('aiPrompt').value = text;
            document.getElementById('aiPrompt').focus();
        }

        // Fungsi Tembak API AI
        function processAiInput(e) {
            e.preventDefault();
            const promptInput = document.getElementById('aiPrompt');
            const btn = document.getElementById('btnProses');
            
            const originalText = promptInput.value;
            
            if(!originalText.trim()) return;

            btn.innerHTML = `<svg class="animate-spin w-4 h-4 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Memproses...`;
            btn.disabled = true;

            // PENTING: Pastikan payload JSON sesuai dengan yang diminta Controller AI kamu
            fetch('/api/ai-input', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                body: JSON.stringify({ text: originalText }) 
            })
            .then(res => res.json())
            .then(data => {
                if(data.status === 'success') {
                    promptInput.value = ''; // Kosongkan input
                    loadRecentHistory(); // Refresh daftar riwayat
                } else {
                    alert("AI gagal memproses: " + (data.message || 'Coba gunakan kalimat yang lebih jelas.'));
                }
            })
            .catch(err => {
                console.error(err);
                alert("Terjadi kesalahan koneksi saat memproses AI.");
            })
            .finally(() => {
                btn.innerHTML = `<svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" /></svg> Proses`;
                btn.disabled = false;
            });
        }

        // Fungsi Load Riwayat Transaksi (Ambil 3 Teratas)
        function loadRecentHistory() {
            fetch('/api/transactions', { headers: { 'Accept': 'application/json' } })
            .then(res => res.json())
            .then(data => {
                const list = document.getElementById('aiHistoryList');
                list.innerHTML = '';
                
                const transactions = data.data.data || [];
                
                if(transactions.length === 0) {
                    list.innerHTML = '<div class="py-8 text-center text-gray-400">Belum ada riwayat transaksi.</div>';
                    return;
                }

                // Ambil maksimal 5 transaksi terakhir untuk ditampilkan di riwayat AI
                transactions.slice(0, 5).forEach(trx => {
                    // Coba cari icon di kategori (pakai default jika tidak ada)
                    const icon = trx.category_icon || '📝'; 
                    const isIncome = trx.type === 'pemasukan';
                    const amountColor = isIncome ? 'text-green-600' : 'text-gray-800';
                    const prefix = isIncome ? '+' : '';

                    list.innerHTML += `
                        <div class="flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 rounded-2xl transition-colors border border-transparent hover:border-gray-200">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-xl shadow-sm border border-gray-100">
                                    ${icon}
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800">${trx.notes || 'Transaksi AI'}</h4>
                                    <p class="text-xs text-gray-500 mt-0.5">Input: "${trx.notes || '-'}"</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="font-bold ${amountColor}">${prefix}${formatRupiah(trx.amount)}</div>
                                <div class="inline-block mt-1 px-2 py-0.5 bg-white border border-gray-200 rounded-md text-[10px] font-semibold text-gray-500">
                                    ${trx.category}
                                </div>
                            </div>
                        </div>
                    `;
                });
            });
        }

        document.addEventListener('DOMContentLoaded', loadRecentHistory);
    </script>
    @endpush
</x-app-layout>
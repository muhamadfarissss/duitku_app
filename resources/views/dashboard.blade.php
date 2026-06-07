<x-app-layout>
    
    <div class="px-10 py-12">
        <div class="mb-12">
            <h2 class="text-4xl font-bold tracking-tight text-[#0f172a]">Dashboard</h2>
            <p class="text-gray-500 mt-2 text-lg">Ringkasan keuangan Anda</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
            <div class="bg-white rounded-2xl p-7 shadow-lg shadow-gray-200/70">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-[#0061cc]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m0 0l-6-6m6 6l6-6" /></svg>
                </div>
                <p class="text-gray-500 text-lg">Total Pemasukan</p>
                <h3 id="total-income" class="text-3xl font-bold mt-3 text-gray-300">...</h3>
            </div>

            <div class="bg-white rounded-2xl p-7 shadow-lg shadow-gray-200/70">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 20V4m0 0l-6 6m6-6l6 6" /></svg>
                </div>
                <p class="text-gray-500 text-lg">Total Pengeluaran</p>
                <h3 id="total-expense" class="text-3xl font-bold mt-3 text-gray-300">...</h3>
            </div>

            <div class="bg-white rounded-2xl p-7 shadow-lg shadow-gray-200/70">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-[#0061cc]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2" /><line x1="2" y1="10" x2="22" y2="10" /></svg>
                </div>
                <p class="text-gray-500 text-lg">Saldo Bersih</p>
                <h3 id="balance" class="text-3xl font-bold mt-3 text-gray-300">...</h3>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
            <div class="bg-white rounded-2xl p-8 shadow-lg shadow-gray-200/70">
                <h3 class="text-2xl font-bold">Pengeluaran per Kategori</h3>
                <p class="text-gray-500 mt-2 mb-10">Distribusi pengeluaran saat ini</p>
                <div class="flex justify-center mb-10">
                    <div id="pie-chart" class="w-64 h-64 rounded-full relative transition-all duration-500" style="background: #e2e8f0;">
                        <div class="absolute inset-16 bg-white rounded-full"></div>
                    </div>
                </div>
                <div id="category-list" class="space-y-4">
                    <p class="text-sm text-gray-400 text-center animate-pulse">Memuat data kategori...</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-lg shadow-gray-200/70">
                <h3 class="text-2xl font-bold">Progress Budget</h3>
                <p class="text-gray-500 mt-2 mb-10">Penggunaan budget berdasarkan kategori</p>
                <div id="budget-list" class="space-y-10">
                    <p class="text-sm text-gray-400 text-center animate-pulse">Memuat data budget...</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chartColors = ['#0061cc', '#f59e0b', '#22c55e', '#06b6d4', '#8b5cf6', '#ef4444', '#f97316'];
            const formatRupiah = (angka) => new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(angka);

            fetch('/api/dashboard-summary', {
                headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(data => {
                if(data.status === 'success') {
                    const resData = data.data;

                    document.getElementById('total-income').innerText = formatRupiah(resData.total_income);
                    document.getElementById('total-income').classList.remove('text-gray-300');
                    document.getElementById('total-expense').innerText = formatRupiah(resData.total_expense);
                    document.getElementById('total-expense').classList.remove('text-gray-300');
                    document.getElementById('balance').innerText = formatRupiah(resData.balance);
                    document.getElementById('balance').classList.remove('text-gray-300');

                    const expenses = resData.expenses_by_category;
                    const totalExp = resData.total_expense;
                    let pieGradient = [], catHtml = '', currentDegree = 0;

                    if(expenses && expenses.length > 0 && totalExp > 0) {
                        expenses.forEach((item, index) => {
                            let percent = Math.round((item.total / totalExp) * 100);
                            let color = chartColors[index % chartColors.length];
                            let nextDegree = currentDegree + percent;
                            pieGradient.push(`${color} ${currentDegree}% ${nextDegree}%`);
                            currentDegree = nextDegree;
                            catHtml += `<div class="flex justify-between items-center"><span class="flex items-center text-gray-700 font-medium"><span class="inline-block w-3 h-3 rounded-full mr-3" style="background-color: ${color}"></span>${item.category}</span><span class="font-bold text-gray-800">${percent}%</span></div>`;
                        });
                        document.getElementById('pie-chart').style.background = `conic-gradient(${pieGradient.join(', ')})`;
                        document.getElementById('category-list').innerHTML = catHtml;
                    } else {
                        document.getElementById('category-list').innerHTML = '<p class="text-sm text-gray-400 text-center py-4">Belum ada transaksi pengeluaran</p>';
                    }

                    const budgets = resData.budgets;
                    let budgetHtml = '';
                    if(budgets && budgets.length > 0) {
                        budgets.forEach(b => {
                            let catName = b.category ? b.category.name : 'Kategori Dihapus';
                            let expItem = expenses.find(e => e.category === catName);
                            let spent = expItem ? expItem.total : 0;
                            let limit = b.nominal_limit;
                            let percentUsed = limit > 0 ? Math.round((spent / limit) * 100) : 0;
                            let barWidth = percentUsed > 100 ? 100 : percentUsed;
                            let barColor = percentUsed > 90 ? 'bg-red-500' : (percentUsed > 75 ? 'bg-yellow-500' : 'bg-[#0061cc]');
                            let textColor = percentUsed > 100 ? 'text-red-500 font-bold' : 'text-gray-700';

                            budgetHtml += `<div><div class="flex justify-between mb-3 font-medium"><span class="text-gray-800">${catName} <span class="text-xs text-gray-400 font-normal ml-2 block sm:inline">(${formatRupiah(spent)} / ${formatRupiah(limit)})</span></span><span class="${textColor}">${percentUsed}%</span></div><div class="w-full h-3 bg-gray-100 rounded-full overflow-hidden"><div class="h-3 ${barColor} rounded-full transition-all duration-1000 ease-out" style="width: ${barWidth}%"></div></div></div>`;
                        });
                        document.getElementById('budget-list').innerHTML = budgetHtml;
                    } else {
                        document.getElementById('budget-list').innerHTML = '<p class="text-sm text-gray-400 text-center py-10">Belum ada limit budget yang diatur</p>';
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>
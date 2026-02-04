<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan - ObatKu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

</head>
<body class="bg-[#F9FBFC] text-slate-800">

    <div class="flex min-h-screen">
        <aside class="w-72 bg-white border-r border-slate-100 p-8 flex flex-col fixed h-full z-50">
            <div class="flex items-center gap-3 mb-12">
                <div class="bg-emerald-600 p-2.5 rounded-2xl shadow-lg shadow-emerald-200">
                    <i class="fas fa-clinic-medical text-white text-xl"></i>
                </div>
                <h1 class="text-2xl font-extrabold tracking-tight text-slate-900">Obat<span class="text-emerald-600">Ku</span></h1>
            </div>
            <nav class="space-y-1.5 flex-grow">
                <a href="homeback.php" class="nav-link flex items-center gap-4 p-3.5 text-slate-500 hover:bg-emerald-50 hover:text-emerald-700 rounded-2xl font-semibold transition-all">
                    <i class="fas fa-th-large w-5"></i> <span>Dashboard</span>
                </a>
                <a href="koleksi.php" class="nav-link flex items-center gap-4 p-3.5 text-slate-500 hover:bg-emerald-50 hover:text-emerald-700 rounded-2xl font-semibold transition-all">
                    <i class="fas fa-pills w-5"></i> <span>Koleksi Obat</span>
                </a>
                <a href="#" class="nav-link flex items-center gap-4 p-3.5 bg-emerald-700 text-white rounded-2xl shadow-lg shadow-emerald-700/20 font-semibold transition-all">
                    <i class="fas fa-chart-line w-5"></i> <span>Laporan Toko</span>
                </a>
            </nav>
        </aside>

        <main class="flex-1 ml-72 p-10">
            <header class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-4xl font-black text-slate-900 tracking-tight mb-2">Laporan Toko</h2>
                    <p class="text-slate-500 font-medium">Periode: <span class="text-emerald-600 font-bold">Februari 2026</span></p>
                </div>
                <div class="flex gap-3">
                    <button class="flex items-center gap-2 bg-white border border-slate-200 px-6 py-3 rounded-2xl font-bold text-slate-600 hover:bg-slate-50 transition-all shadow-sm">
                        <i class="fas fa-calendar-alt text-emerald-600"></i> Pilih Tanggal
                    </button>
                    <button class="flex items-center gap-2 bg-emerald-700 text-white px-6 py-3 rounded-2xl font-bold hover:bg-emerald-800 shadow-xl shadow-emerald-700/40 transition-all hover:-translate-y-1">
                        <i class="fas fa-file-export"></i> Export PDF
                    </button>
                </div>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Total Penjualan</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-black text-slate-900">Rp 142.8M</h3>
                        <span class="text-emerald-500 font-bold text-xs bg-emerald-50 px-3 py-1 rounded-full">+12.5%</span>
                    </div>
                    <div class="w-full bg-slate-100 h-1.5 rounded-full mt-6">
                        <div class="bg-emerald-500 h-1.5 rounded-full" style="width: 75%"></div>
                    </div>
                </div>
                <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Transaksi Sukses</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-black text-slate-900">1,248</h3>
                        <span class="text-blue-500 font-bold text-xs bg-blue-50 px-3 py-1 rounded-full">+42 Hari Ini</span>
                    </div>
                    <div class="w-full bg-slate-100 h-1.5 rounded-full mt-6">
                        <div class="bg-blue-500 h-1.5 rounded-full" style="width: 60%"></div>
                    </div>
                </div>
                <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Rata-rata Keranjang</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-black text-slate-900">Rp 115rb</h3>
                        <span class="text-slate-500 font-bold text-xs bg-slate-50 px-3 py-1 rounded-full">Stabil</span>
                    </div>
                    <div class="w-full bg-slate-100 h-1.5 rounded-full mt-6">
                        <div class="bg-slate-800 h-1.5 rounded-full" style="width: 45%"></div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <div class="lg:col-span-2 bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
                    <div class="p-8 border-b border-slate-50 flex justify-between items-center">
                        <h4 class="font-black text-slate-900 tracking-tight">Riwayat Transaksi Terakhir</h4>
                        <a href="#" class="text-xs font-bold text-emerald-600 hover:underline">Lihat Semua</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-slate-50/50 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                <tr>
                                    <th class="px-8 py-5">No. Invoice</th>
                                    <th class="px-8 py-5">Waktu</th>
                                    <th class="px-8 py-5 text-right">Nominal</th>
                                    <th class="px-8 py-5 text-center">Metode</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50 text-sm font-medium">
                                <tr class="hover:bg-slate-50/50 transition-all cursor-default">
                                    <td class="px-8 py-6 font-bold text-slate-800">#INV/26/00124</td>
                                    <td class="px-8 py-6 text-slate-500">Tadi, 10:45</td>
                                    <td class="px-8 py-6 text-right font-black text-slate-900">Rp 450.000</td>
                                    <td class="px-8 py-6 text-center">
                                        <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-lg text-[10px] font-black uppercase">Transfer</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50/50 transition-all cursor-default">
                                    <td class="px-8 py-6 font-bold text-slate-800">#INV/26/00123</td>
                                    <td class="px-8 py-6 text-slate-500">Tadi, 09:20</td>
                                    <td class="px-8 py-6 text-right font-black text-slate-900">Rp 85.500</td>
                                    <td class="px-8 py-6 text-center">
                                        <span class="bg-emerald-50 text-emerald-600 px-3 py-1 rounded-lg text-[10px] font-black uppercase">Tunai</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm p-8">
                    <h4 class="font-black text-slate-900 tracking-tight mb-8">Produk Terlaris</h4>
                    <div class="space-y-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600">
                                    <i class="fas fa-pills"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-slate-800">Paracetamol</p>
                                    <p class="text-[10px] text-slate-400 font-medium">842 Transaksi</p>
                                </div>
                            </div>
                            <span class="text-xs font-black text-emerald-600">Top 1</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600">
                                    <i class="fas fa-capsules"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-slate-800">Amoxicillin</p>
                                    <p class="text-[10px] text-slate-400 font-medium">512 Transaksi</p>
                                </div>
                            </div>
                            <span class="text-xs font-black text-blue-600">Top 2</span>
                        </div>
                    </div>
                    
                    <div class="mt-12 bg-slate-900 rounded-3xl p-6 text-center relative overflow-hidden group">
                        <div class="relative z-10">
                            <p class="text-emerald-400 text-[10px] font-black uppercase tracking-widest mb-2">Insight AI</p>
                            <p class="text-xs text-white leading-relaxed">Penjualan vitamin diprediksi meningkat <span class="text-emerald-400 font-bold">20%</span> minggu depan karena cuaca.</p>
                        </div>
                        <i class="fas fa-brain absolute -right-4 -bottom-4 text-white/5 text-6xl"></i>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>
</html>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
    </style>
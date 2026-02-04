<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Apotek Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans text-gray-800">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-white border-r border-gray-200 p-6 flex flex-col">
            <div class="flex items-center gap-3 mb-10 text-emerald-700">
                <i class="fas fa- clinic-medical text-2xl"></i>
                <h1 class="text-xl font-bold italic">Medika Care</h1>
            </div>

            <nav class="space-y-2 flex-grow">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Menu Utama</p>
                <a href="#" class="flex items-center gap-3 p-3 bg-emerald-700 text-white rounded-xl shadow-sm">
                    <i class="fas fa-th-large"></i> <span>Dashboard</span>
                </a>
                <a href="#" class="flex items-center gap-3 p-3 text-gray-500 hover:bg-emerald-50 hover:text-emerald-700 rounded-xl transition">
                    <i class="fas fa-pills"></i> <span>Koleksi Obat</span>
                </a>
                <a href="#" class="flex items-center gap-3 p-3 text-gray-500 hover:bg-emerald-50 hover:text-emerald-700 rounded-xl transition">
                    <i class="fas fa-shopping-cart"></i> <span>Pesanan</span>
                </a>
                <a href="#" class="flex items-center gap-3 p-3 text-gray-500 hover:bg-emerald-50 hover:text-emerald-700 rounded-xl transition">
                    <i class="fas fa-boxes"></i> <span>Inventaris Stok</span>
                </a>
                <a href="#" class="flex items-center gap-3 p-3 text-gray-500 hover:bg-emerald-50 hover:text-emerald-700 rounded-xl transition">
                    <i class="fas fa-users"></i> <span>Pasien / Pelanggan</span>
                </a>
                <a href="#" class="flex items-center gap-3 p-3 text-gray-500 hover:bg-emerald-50 hover:text-emerald-700 rounded-xl transition">
                    <i class="fas fa-chart-line"></i> <span>Laporan Penjualan</span>
                </a>
            </nav>

            <div class="bg-emerald-50 p-4 rounded-xl mt-auto">
                <div class="flex items-center gap-3 text-emerald-800 font-medium text-sm mb-1">
                    <i class="fas fa-notes-medical"></i> Tips Kesehatan
                </div>
                <p class="text-xs text-emerald-600">Hari ini: Cek berkala masa kedaluwarsa obat.</p>
            </div>
        </aside>

        <main class="flex-1 p-8">
            <header class="flex justify-between items-center mb-8">
                <div class="relative w-1/3">
                    <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" placeholder="Cari obat atau resep..." class="w-full pl-10 pr-4 py-2 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500">
                </div>
                <div class="flex items-center gap-6">
                    <i class="far fa-moon text-gray-500 cursor-pointer"></i>
                    <div class="relative">
                        <i class="far fa-bell text-gray-500 cursor-pointer"></i>
                        <span class="absolute -top-1 -right-1 bg-emerald-500 text-white text-[10px] w-4 h-4 flex items-center justify-center rounded-full">3</span>
                    </div>
                    <div class="flex items-center gap-3 border-l pl-6">
                        <div class="text-right">
                            <p class="text-sm font-bold">Apoteker Admin</p>
                            <p class="text-xs text-gray-400">Pengelola Apotek</p>
                        </div>
                        <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-700 font-bold">A</div>
                    </div>
                </div>
            </header>

            <div class="flex justify-between items-end mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">Selamat Datang Kembali 🏥</h2>
                    <p class="text-gray-500 mt-1">Pantau performa apotek Anda hari ini.</p>
                </div>
                <div class="bg-white px-4 py-2 rounded-lg border border-gray-100 shadow-sm text-sm text-gray-500">
                    <i class="far fa-calendar-alt mr-2 text-emerald-600"></i> Rabu, 4 Februari 2026
                </div>
            </div>

            <div class="grid grid-cols-4 gap-6 mb-8">
                <div class="bg-emerald-800 text-white p-6 rounded-3xl relative overflow-hidden">
                    <p class="text-sm opacity-80">Total Jenis Obat</p>
                    <h3 class="text-4xl font-bold mt-2">248</h3>
                    <p class="text-xs mt-1 opacity-80">12 Kategori Farmasi</p>
                    <div class="mt-4 inline-block bg-emerald-700 px-2 py-1 rounded text-[10px] font-bold">+8% <span class="font-normal opacity-70">dari bulan lalu</span></div>
                    <i class="fas fa-pills absolute -right-4 -bottom-4 text-6xl opacity-10"></i>
                </div>
                <div class="bg-emerald-600/70 text-white p-6 rounded-3xl relative overflow-hidden">
                    <p class="text-sm opacity-90">Pesanan Bulan Ini</p>
                    <h3 class="text-4xl font-bold mt-2">156</h3>
                    <p class="text-xs mt-1 opacity-90">28 resep tertunda</p>
                    <div class="mt-4 inline-block bg-white/20 px-2 py-1 rounded text-[10px] font-bold">+12% <span class="font-normal opacity-70">dari bulan lalu</span></div>
                    <i class="fas fa-file-prescription absolute -right-4 -bottom-4 text-6xl opacity-10"></i>
                </div>
                <div class="bg-emerald-800 text-white p-6 rounded-3xl relative overflow-hidden">
                    <p class="text-sm opacity-80">Pendapatan</p>
                    <h3 class="text-4xl font-bold mt-2">Rp 24.5jt</h3>
                    <p class="text-xs mt-1 opacity-80">Bulan ini</p>
                    <div class="mt-4 inline-block bg-emerald-700 px-2 py-1 rounded text-[10px] font-bold">+18% <span class="font-normal opacity-70">dari bulan lalu</span></div>
                    <i class="fas fa-chart-line absolute -right-4 -bottom-4 text-6xl opacity-10"></i>
                </div>
                <div class="bg-white border border-gray-100 p-6 rounded-3xl shadow-sm relative overflow-hidden">
                    <p class="text-sm text-gray-400">Pasien Setia</p>
                    <h3 class="text-4xl font-bold mt-2 text-gray-800">1,247</h3>
                    <p class="text-xs mt-1 text-gray-400">68 pasien baru</p>
                    <div class="mt-4 inline-block bg-emerald-100 text-emerald-700 px-2 py-1 rounded text-[10px] font-bold">+5% <span class="font-normal opacity-70">dari bulan lalu</span></div>
                    <i class="fas fa-user-injured absolute -right-4 -bottom-4 text-6xl text-gray-50 opacity-10"></i>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-8">
                <div class="col-span-2 bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h4 class="font-bold text-gray-700">Analisis Penjualan Obat</h4>
                        <span class="text-emerald-500 bg-emerald-50 px-2 py-1 rounded text-xs font-bold">+12.5%</span>
                    </div>
                    <div class="grid grid-cols-3 gap-4 mb-8">
                        <div>
                            <p class="text-[10px] text-gray-400 uppercase tracking-wider">Total Penjualan</p>
                            <p class="text-xl font-bold text-gray-800">Rp 22.4jt</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 uppercase tracking-wider">Total Resep</p>
                            <p class="text-xl font-bold text-gray-800">433</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 uppercase tracking-wider">Rata-rata Order</p>
                            <p class="text-xl font-bold text-gray-800">Rp 52rb</p>
                        </div>
                    </div>
                    <div class="h-48 bg-gray-50 rounded-xl flex items-end justify-between px-4 pb-2">
                        <div class="w-8 bg-emerald-200 h-20 rounded-t"></div>
                        <div class="w-8 bg-emerald-300 h-32 rounded-t"></div>
                        <div class="w-8 bg-emerald-400 h-24 rounded-t"></div>
                        <div class="w-8 bg-emerald-600 h-40 rounded-t"></div>
                        <div class="w-8 bg-emerald-800 h-36 rounded-t"></div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h4 class="font-bold text-gray-700 text-sm">Pesanan Masuk</h4>
                        <button class="text-xs text-emerald-600 font-semibold border border-emerald-100 px-3 py-1 rounded-lg">Lihat Semua</button>
                    </div>
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="flex-grow">
                                <p class="text-xs font-bold">Ibu Sari <span class="text-gray-300 ml-1">#ORD-001</span></p>
                                <p class="text-[10px] text-gray-400">Paracetamol 500mg × 3</p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs font-bold">Rp 75.000</p>
                                <span class="text-[8px] bg-blue-50 text-blue-500 px-2 py-0.5 rounded-full font-bold uppercase">Baru</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-box"></i>
                            </div>
                            <div class="flex-grow">
                                <p class="text-xs font-bold">Bpk. Andi <span class="text-gray-300 ml-1">#ORD-002</span></p>
                                <p class="text-[10px] text-gray-400">Amoxicillin Syifa × 5</p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs font-bold">Rp 125.000</p>
                                <span class="text-[8px] bg-orange-50 text-orange-500 px-2 py-0.5 rounded-full font-bold uppercase">Diproses</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>
</html>
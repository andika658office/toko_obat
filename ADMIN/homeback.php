<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medika Care - Dashboard Apotek Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

</head>
<body class="bg-[#F8FAFC] text-slate-800">

  <div class="flex min-h-screen">
        <aside class="w-72 bg-white border-r border-slate-100 p-8 flex flex-col fixed h-full z-50">
            <div class="flex items-center gap-3 mb-12">
                <div class="bg-emerald-600 p-2.5 rounded-2xl shadow-lg shadow-emerald-200">
                    <i class="fas fa-clinic-medical text-white text-xl"></i>
                </div>
                <h1 class="text-2xl font-extrabold tracking-tight text-slate-900">Obat<span class="text-emerald-600">Ku</span></h1>
            </div>

            <nav class="space-y-1.5 flex-grow" id="main-nav">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.1em] mb-4 ml-2">Menu Utama</p>
                
                <a href="#dashboard" class="nav-link flex items-center gap-4 p-3.5 bg-emerald-700 text-white rounded-2xl shadow-lg shadow-emerald-700/20 font-semibold">
                    <i class="fas fa-th-large w-5"></i> <span>Dashboard</span>
                </a>
                
                <a href="koleksi.php" class="nav-link flex items-center gap-4 p-3.5 text-slate-500 hover:bg-emerald-50 hover:text-emerald-700 rounded-2xl font-medium">
                    <i class="fas fa-pills w-5"></i> <span>Koleksi Obat</span>
                </a>
                
                <a href="#pesanan" class="nav-link flex items-center gap-4 p-3.5 text-slate-500 hover:bg-emerald-50 hover:text-emerald-700 rounded-2xl font-medium">
                    <i class="fas fa-shopping-cart w-5"></i> <span>Pesanan</span>
                </a>
                
                <a href="#inventaris" class="nav-link flex items-center gap-4 p-3.5 text-slate-500 hover:bg-emerald-50 hover:text-emerald-700 rounded-2xl font-medium">
                    <i class="fas fa-boxes w-5"></i> <span>Inventaris Stok</span>
                </a>
                
                <a href="#pelanggan" class="nav-link flex items-center gap-4 p-3.5 text-slate-500 hover:bg-emerald-50 hover:text-emerald-700 rounded-2xl font-medium">
                    <i class="fas fa-users w-5"></i> <span>Pasien</span>
                </a>
                
                <a href="laporan.php" class="nav-link flex items-center gap-4 p-3.5 text-slate-500 hover:bg-emerald-50 hover:text-emerald-700 rounded-2xl font-medium">
                    <i class="fas fa-chart-line w-5"></i> <span>Laporan</span>
                </a>
            </nav>

            <div class="bg-emerald-900 rounded-[2rem] p-6 mt-auto relative overflow-hidden shadow-xl">
                <div class="relative z-10">
                    <div class="flex items-center gap-2 text-emerald-400 font-bold text-[10px] uppercase mb-2">
                        <i class="fas fa-lightbulb"></i> Tips Hari Ini
                    </div>
                    <p class="text-xs text-emerald-50 leading-relaxed font-medium">Jangan lupa cek masa kedaluwarsa obat rak A1.</p>
                </div>
                <i class="fas fa-shield-virus absolute -right-4 -bottom-4 text-emerald-800 text-6xl opacity-40"></i>
            </div>
        </aside>

        <main class="flex-1 ml-72 p-10">
            
<header class="flex justify-between items-center mb-12 bg-white/50 backdrop-blur-md sticky top-0 z-40 py-4 -mx-4 px-4 rounded-2xl">
    <div class="relative w-96">
        <span class="absolute inset-y-0 left-4 flex items-center text-slate-400">
            <i class="fas fa-search"></i>
        </span>
        <input type="text" placeholder="Cari obat, pasien, atau invoice..." class="w-full pl-12 pr-4 py-3 bg-white border border-slate-200 rounded-2xl focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 outline-none transition-all shadow-sm">
    </div>

    <div class="flex items-center gap-4">
        <div class="flex items-center gap-4 bg-white p-1.5 pr-4 border border-slate-200 rounded-2xl shadow-sm hover:shadow-md transition-shadow cursor-pointer">
            <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-emerald-800 rounded-xl flex items-center justify-center text-white font-bold shadow-lg">A</div>
            <div class="hidden md:block">
                 <p class="text-xs font-bold text-slate-900 leading-none mb-1">Apoteker Admin</p>
                <p class="text-[10px] text-slate-400 font-medium">Administrator</p> 
            </div>
        </div>

        <a href="../account/logout.php" class="group flex items-center gap-0 hover:gap-3 p-1.5 bg-white border border-slate-200 hover:bg-red-500 hover:border-red-500 rounded-xl transition-all duration-500 ease-in-out w-[52px] hover:w-32 overflow-hidden shadow-sm">
            <div class="flex items-center justify-center min-w-[38px] h-[38px] text-red-500 group-hover:text-white transition-all duration-300">
                <i class="fas fa-power-off text-lg"></i>
            </div>
            <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-500 text-white font-black text-[10px] tracking-widest whitespace-nowrap">
                LOGOUT
            </span>
        </a>
    </div>
</header>

            <section id="dashboard" class="mb-16">
                <div class="mb-8">
                    <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Dashboard Utama</h2>
                    <p class="text-sm text-slate-500 font-medium">Selamat pagi! Berikut ringkasan performa apotek.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                    <div class="stat-card bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-sm shadow-slate-200/50 relative overflow-hidden">
                        <div class="bg-blue-50 w-12 h-12 rounded-2xl flex items-center justify-center text-blue-600 mb-4">
                            <i class="fas fa-pills text-xl"></i>
                        </div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Obat</p>
                        <h3 class="text-3xl font-black mt-1 text-slate-800">248</h3>
                        <div class="mt-4 flex items-center text-[10px] font-bold text-emerald-600 bg-emerald-50 w-fit px-2 py-1 rounded-lg">
                            <i class="fas fa-arrow-up mr-1"></i> +4 Baru
                        </div>
                    </div>

                    <div class="stat-card bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-sm shadow-slate-200/50 relative overflow-hidden">
                        <div class="bg-emerald-50 w-12 h-12 rounded-2xl flex items-center justify-center text-emerald-600 mb-4">
                            <i class="fas fa-shopping-basket text-xl"></i>
                        </div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Pesanan Hari Ini</p>
                        <h3 class="text-3xl font-black mt-1 text-slate-800">156</h3>
                        <div class="mt-4 flex items-center text-[10px] font-bold text-emerald-600 bg-emerald-50 w-fit px-2 py-1 rounded-lg">
                            <i class="fas fa-arrow-up mr-1"></i> +12%
                        </div>
                    </div>

                    <div class="stat-card bg-emerald-700 p-6 rounded-[2.5rem] shadow-xl shadow-emerald-700/20 relative overflow-hidden">
                        <div class="bg-white/20 w-12 h-12 rounded-2xl flex items-center justify-center text-white mb-4 backdrop-blur-md">
                            <i class="fas fa-wallet text-xl"></i>
                        </div>
                        <p class="text-xs font-bold text-emerald-200 uppercase tracking-wider">Pendapatan</p>
                        <h3 class="text-3xl font-black mt-1 text-white">Rp 24.5jt</h3>
                        <p class="text-[10px] text-emerald-300 mt-4 font-medium italic">*Bulan berjalan</p>
                    </div>

                    <div class="stat-card bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-sm shadow-slate-200/50 relative overflow-hidden">
                        <div class="bg-orange-50 w-12 h-12 rounded-2xl flex items-center justify-center text-orange-600 mb-4">
                            <i class="fas fa-user-injured text-xl"></i>
                        </div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Pasien Baru</p>
                        <h3 class="text-3xl font-black mt-1 text-slate-800">68</h3>
                        <div class="mt-4 flex items-center text-[10px] font-bold text-orange-600 bg-orange-50 w-fit px-2 py-1 rounded-lg">
                            <i class="fas fa-clock mr-1"></i> Hari ini
                        </div>
                    </div>
                </div>
            </section>

            <section id="pesanan" class="mb-20">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">🛒 Pesanan Terbaru</h2>
                    <button class="text-emerald-600 text-sm font-bold hover:underline">Lihat Semua</button>
                </div>
                <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden shadow-slate-200/60">
                    <table class="w-full text-left">
                        <thead class="bg-slate-50/80 text-[10px] uppercase text-slate-400 font-black tracking-widest border-b border-slate-100">
                            <tr>
                                <th class="px-8 py-5">ID Pesanan</th>
                                <th class="px-8 py-5">Pasien</th>
                                <th class="px-8 py-5">Total Bayar</th>
                                <th class="px-8 py-5 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-slate-50">
                            <tr class="hover:bg-slate-50/50 transition-colors group cursor-pointer">
                                <td class="px-8 py-6 font-bold text-slate-700">#ORD-001</td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 bg-slate-100 rounded-full flex items-center justify-center text-[10px] font-bold text-slate-500 uppercase">IS</div>
                                        <span class="font-semibold text-slate-600">Ibu Sari</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6 font-black text-slate-900">Rp 75.000</td>
                                <td class="px-8 py-6 text-center">
                                    <span class="bg-emerald-100 text-emerald-700 px-4 py-1.5 rounded-full text-[10px] font-extrabold shadow-sm border border-emerald-200">SELESAI</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50/50 transition-colors group cursor-pointer">
                                <td class="px-8 py-6 font-bold text-slate-700">#ORD-002</td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 bg-slate-100 rounded-full flex items-center justify-center text-[10px] font-bold text-slate-500 uppercase">AA</div>
                                        <span class="font-semibold text-slate-600">Andi Ahmad</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6 font-black text-slate-900">Rp 120.000</td>
                                <td class="px-8 py-6 text-center">
                                    <span class="bg-blue-100 text-blue-700 px-4 py-1.5 rounded-full text-[10px] font-extrabold shadow-sm border border-blue-200">DIPROSES</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <section id="inventaris" class="mb-20">
                <div class="flex items-center gap-3 mb-6">
                    <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">📦 Inventaris Stok</h2>
                </div>
                <div class="bg-white border-l-8 border-orange-500 p-8 rounded-[2.5rem] shadow-sm flex items-center justify-between shadow-slate-200/60">
                    <div class="flex items-center gap-6">
                        <div class="bg-orange-100 p-4 rounded-2xl text-orange-600">
                            <i class="fas fa-exclamation-triangle text-2xl animate-pulse"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg text-slate-800">Peringatan Stok Rendah!</h4>
                            <p class="text-slate-500 text-sm">Ada 2 jenis obat yang stoknya di bawah 10 unit. Mohon segera lakukan pemesanan ulang.</p>
                        </div>
                    </div>
                    <button class="bg-slate-900 text-white px-6 py-3 rounded-2xl text-xs font-bold hover:bg-slate-800 transition shadow-lg shadow-slate-900/20">Cek Sekarang</button>
                </div>
            </section>

            <section id="pelanggan" class="mb-20">
                <h2 class="text-2xl font-extrabold text-slate-900 mb-8 tracking-tight">👥 Data Pasien</h2>
                <div class="bg-slate-50 border-2 border-dashed border-slate-200 rounded-[2.5rem] p-16 text-center">
                    <div class="bg-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 shadow-sm">
                        <i class="fas fa-users text-slate-300 text-2xl"></i>
                    </div>
                    <p class="text-slate-400 font-bold text-sm tracking-wide">MODUL DATA PASIEN SEDANG DIMUAT</p>
                    <p class="text-slate-300 text-xs mt-2 italic">Menyinkronkan data dari cloud...</p>
                </div>
            </section>
        </main>
    </div>

    <script>
        const navLinks = document.querySelectorAll('.nav-link');
        const sections = document.querySelectorAll('section');

        // Fungsi Aktif saat Klik
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                navLinks.forEach(l => {
                    l.classList.remove('bg-emerald-700', 'text-white', 'shadow-lg', 'shadow-emerald-700/20', 'font-semibold');
                    l.classList.add('text-slate-500', 'font-medium');
                });

                this.classList.add('bg-emerald-700', 'text-white', 'shadow-lg', 'shadow-emerald-700/20', 'font-semibold');
                this.classList.remove('text-slate-500', 'font-medium');
            });
        });

        // ScrollSpy logic
        window.addEventListener('scroll', () => {
            let current = "";
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                if (pageYOffset >= (sectionTop - 300)) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('bg-emerald-700', 'text-white', 'shadow-lg', 'shadow-emerald-700/20', 'font-semibold');
                link.classList.add('text-slate-500', 'font-medium');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('bg-emerald-700', 'text-white', 'shadow-lg', 'shadow-emerald-700/20', 'font-semibold');
                    link.classList.remove('text-slate-500', 'font-medium');
                }
            });
        });
    </script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        
        /* Animasi transisi halus */
        .nav-link { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        section { scroll-margin-top: 5rem; }

        /* Efek Hover Card */
        .stat-card { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .stat-card:hover { transform: translateY(-5px); }
    </style>
</body>
</html>
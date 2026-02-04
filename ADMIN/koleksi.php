<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ObatKu - Katalog Obat Digital</title>
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

            <nav class="space-y-1.5 flex-grow" id="main-nav">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-4 ml-2">Menu Utama</p>
                
                <a href="homeback.php" class="nav-link flex items-center gap-4 p-3.5 text-slate-500 hover:bg-emerald-50 hover:text-emerald-700 rounded-2xl font-semibold">
                    <i class="fas fa-th-large w-5"></i> <span>Dashboard</span>
                </a>
                
                <a href="koleksi.php" class="nav-link flex items-center gap-4 p-3.5 bg-emerald-700 text-white rounded-2xl shadow-lg shadow-emerald-700/20 font-semibold">
                    <i class="fas fa-pills w-5"></i> <span>Koleksi Obat</span>
                </a>
                
                <a href="laporan.php" class="nav-link flex items-center gap-4 p-3.5 text-slate-500 hover:bg-emerald-50 hover:text-emerald-700 rounded-2xl font-medium">
                    <i class="fas fa-chart-line w-5"></i> <span>Laporan</span>
                </a>


            </nav>

            <div class="bg-slate-900 rounded-[2rem] p-6 mt-auto relative overflow-hidden">
                <div class="relative z-10">
                    <p class="text-emerald-400 font-bold text-[10px] uppercase tracking-widest mb-2">Tips Sistem</p>
                    <p class="text-xs text-slate-300 leading-relaxed">Update stok dilakukan setiap pergantian shift apoteker.</p>
                </div>
                <div class="absolute -right-4 -bottom-4 bg-white/5 w-20 h-20 rounded-full"></div>
            </div>
        </aside>

        <main class="flex-1 ml-72 p-10">
            <section id="koleksi-admin" class="max-w-7xl mx-auto">
                
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-12">
                    <div>
                        <h2 class="text-4xl font-black text-slate-900 tracking-tight mb-2">Katalog Obat</h2>
                        <div class="flex items-center gap-2 text-slate-500 text-sm font-medium">
                            <span class="flex h-2 w-2 rounded-full bg-emerald-500"></span>
                            Sistem sinkron: 248 Produk Terdaftar
                        </div>
                    </div>
                    
                    <div class="flex gap-4 w-full md:w-auto">
                        <div class="relative flex-grow md:flex-grow-0">
                            <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                            <input type="text" placeholder="Cari nama obat..." class="pl-11 pr-6 py-3.5 bg-white border border-slate-200 rounded-2xl focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 outline-none transition-all w-full md:w-64 shadow-sm text-sm font-medium">
                        </div>
                        <button class="flex items-center justify-center gap-2 bg-emerald-600 text-white px-8 py-3.5 rounded-2xl font-bold hover:bg-emerald-700 shadow-xl shadow-emerald-600/20 transition-all hover:-translate-y-1 active:scale-95 whitespace-nowrap text-sm">
                            <i class="fas fa-plus-circle"></i> Tambah Item
                        </button>
                    </div>
                </div>

                <div class="flex gap-3 mb-10 overflow-x-auto pb-4 no-scrollbar">
                    <button class="px-7 py-3 bg-slate-900 text-white rounded-2xl text-xs font-bold shadow-xl shadow-slate-900/20 whitespace-nowrap">Semua Produk</button>
                    <button class="px-7 py-3 bg-white text-slate-500 border border-slate-200 rounded-2xl text-xs font-bold hover:border-emerald-500 hover:text-emerald-700 transition-all whitespace-nowrap shadow-sm">💊 Antibiotik</button>
                    <button class="px-7 py-3 bg-white text-slate-500 border border-slate-200 rounded-2xl text-xs font-bold hover:border-emerald-500 hover:text-emerald-700 transition-all whitespace-nowrap shadow-sm">🤒 Analgesik</button>
                    <button class="px-7 py-3 bg-white text-slate-500 border border-slate-200 rounded-2xl text-xs font-bold hover:border-emerald-500 hover:text-emerald-700 transition-all whitespace-nowrap shadow-sm">🌿 Herbal</button>
                    <button class="px-7 py-3 bg-white text-slate-500 border border-slate-200 rounded-2xl text-xs font-bold hover:border-emerald-500 hover:text-emerald-700 transition-all whitespace-nowrap shadow-sm">🧪 Cairan</button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    
                    <div class="medicine-card group bg-white rounded-[2.5rem] p-4 border border-slate-100 shadow-sm relative overflow-hidden">
                        <div class="relative overflow-hidden bg-slate-50 rounded-[2rem] h-48 flex items-center justify-center mb-6">
                            <i class="fas fa-pills text-7xl text-slate-200 group-hover:scale-110 group-hover:text-emerald-100 transition-all duration-700"></i>
                            <div class="absolute top-4 left-4">
                                <span class="flex items-center gap-1.5 bg-white px-3 py-1.5 rounded-full text-[10px] font-extrabold text-emerald-600 shadow-sm border border-emerald-50">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> STOK AMAN
                                </span>
                            </div>
                            <div class="absolute inset-0 bg-emerald-900/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-2 backdrop-blur-[2px]">
                                <button class="w-10 h-10 bg-white rounded-xl text-slate-700 hover:bg-emerald-600 hover:text-white transition-all shadow-lg"><i class="fas fa-pen text-sm"></i></button>
                                <button class="w-10 h-10 bg-white rounded-xl text-red-500 hover:bg-red-500 hover:text-white transition-all shadow-lg"><i class="fas fa-trash text-sm"></i></button>
                            </div>
                        </div>

                        <div class="px-2 pb-2">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-[10px] font-black tracking-[0.1em] text-slate-400 uppercase">CEF-200-MG</span>
                                <span class="text-[10px] font-bold text-blue-600 bg-blue-50 px-2.5 py-1 rounded-lg">Tablet</span>
                            </div>
                            <h4 class="text-xl font-bold text-slate-800 mb-1 group-hover:text-emerald-700 transition-colors">Cefixime 200mg</h4>
                            <p class="text-xs text-slate-400 font-medium mb-6">Antibiotik Infeksi Bakteri</p>
                            
                            <div class="grid grid-cols-2 gap-3 p-4 bg-slate-50 rounded-2xl group-hover:bg-emerald-50 transition-colors">
                                <div>
                                    <p class="text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-0.5">Harga</p>
                                    <p class="text-base font-black text-emerald-700">Rp 12.000</p>
                                </div>
                                <div class="text-right border-l border-slate-200 pl-3 group-hover:border-emerald-200">
                                    <p class="text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-0.5">Stok</p>
                                    <p class="text-base font-black text-slate-800">142 Pcs</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
            </section>
        </main>
    </div>

    <script>
        // Logika Navigasi Aktif
        const links = document.querySelectorAll('.nav-link');
        links.forEach(link => {
            link.addEventListener('click', function() {
                links.forEach(l => {
                    l.classList.remove('bg-emerald-700', 'text-white', 'shadow-lg', 'shadow-emerald-700/20');
                    l.classList.add('text-slate-500');
                });
                this.classList.add('bg-emerald-700', 'text-white', 'shadow-lg', 'shadow-emerald-700/20');
                this.classList.remove('text-slate-500');
            });
        });
    </script>
</body>
</html>

 <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        
        .nav-link { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        
        /* Card glassmorphism effect on hover */
        .medicine-card {
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        }
        .medicine-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px -12px rgba(16, 185, 129, 0.15);
        }
    </style>
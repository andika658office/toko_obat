<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | SehatFarma</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    
<body>

<nav>
    <div class="logo-container">
        <div class="logo-icon"><i class="fas fa-plus"></i></div>
        <div class="logo-text">
            <b>ObatKu</b>
            <span>Toko Obat Terpercaya</span>
        </div>
    </div>

    <ul class="menu">
        <li><a href="#home">Beranda</a></li>
        <li><a href="#data_obat">Produk</a></li>
        <li><a href="#laporan">Tentang Kami</a></li>
        <li><a href="#kontak">Kontak</a></li>
    </ul>

    <div class="flex items-center gap-4">
        <a href="data_transaksi.php" class="btn-keranjang">
            <i class="fas fa-shopping-cart text-xs"></i> 
            <span>Keranjang</span>
        </a>

        <a href="../account/login.php" class="btn-login">
            <i class="far fa-user-circle mr-2"></i>Login 
        </a>

         <div class="profile" id="profileBox" onclick="toggleProfile()">
            <div class="profile-trigger">
                <div class="w-7 h-7 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center text-xs font-bold">U</div>
                <span class="text-sm font-bold text-slate-700">User</span>
                <i class="fas fa-chevron-down text-[10px] text-slate-400"></i>
            </div>
            <div class="dropdown">
                <a href="profil.php"><i class="far fa-user-circle"></i> Profil Saya</a>
                <hr class="border-slate-50">
                <a href="logout.php" class="text-red-500 hover:bg-red-50"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
        
    </div>
</nav>

<section class="hero">
    <div class="hero-content">
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-white rounded-full shadow-sm border border-emerald-50 mb-8">
            <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
            <span class="text-xs font-bold text-emerald-700 uppercase tracking-wider">Apotek Online Terpercaya</span>
        </div>
        <h1>Kesehatan Anda,<br><span>Prioritas Kami</span></h1>
        <p class="text-slate-500 text-lg mb-10 max-w-md leading-relaxed">Dapatkan obat-obatan berkualitas dengan harga terjangkau. Pesan mudah, pengiriman cepat ke seluruh Indonesia.</p>
        
        <div class="flex gap-4">
            <a href="data_obat.php" class="px-8 py-4 bg-emerald-500 text-white rounded-2xl font-bold hover:bg-emerald-600 transition-all shadow-lg shadow-emerald-200 flex items-center gap-3">
                Belanja Sekarang <i class="fas fa-arrow-right text-sm"></i>
            </a>
        </div>
    </div>

    <div class="flex-1 flex justify-center relative">
    <div class="w-[450px] h-[450px] bg-white rounded-[40px] shadow-2xl shadow-slate-100 flex items-center justify-center relative border border-white">
        
        <i class="fas fa-staff-snake text-[120px] text-slate-100"></i>

        <div class="absolute -top-5 -right-5 p-6 bg-emerald-500 text-white rounded-3xl shadow-xl animate-bounce duration-[3000ms]">
            <i class="fas fa-pills text-3xl"></i>
        </div>

        <div class="absolute -bottom-8 -left-8 p-5 bg-white rounded-2xl shadow-xl flex items-center gap-4 border border-slate-50">
            <div class="w-12 h-12 bg-emerald-500 text-white rounded-xl flex items-center justify-center shadow-lg shadow-emerald-100 animate-bounce duration-[3000ms]">
                <i class="fas fa-shield-halved"></i>
            </div>
            <div>
                <div class="text-xl font-extrabold text-slate-800">10.000+</div>
                <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Produk Tersedia</div>
            </div>
        </div>

        <div class="absolute bottom-10 -right-12 p-4 bg-white rounded-2xl shadow-xl flex flex-col gap-2 border border-slate-50 w-40 animate-pulse ">
            <div class="w-full h-20 bg-slate-100 rounded-xl flex items-center justify-center animate-bounce duration-[3000ms]">
                <i class="fas fa-bottle-medication text-slate-300 text-2xl"></i>
            </div>
            <div class="h-2 w-3/4 bg-slate-200 rounded-full"></div>
            <div class="h-2 w-1/2 bg-emerald-100 rounded-full"></div>
        </div>

        <div class="absolute top-10 -left-16 p-3 bg-white rounded-full shadow-lg flex items-center gap-3 border border-slate-50 px-5">
            <div class="relative">
                <div class="w-10 h-10 bg-orange-100 text-orange-500 rounded-full flex items-center justify-center text-sm animate-bounce duration-[3000ms]">
                    <i class="fas fa-truck-fast"></i>
                </div>
                <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 border-2 border-white rounded-full"></span>
            </div>
            <div>
                <div class="text-[10px] font-extrabold text-slate-800 leading-tight">Kurir Meluncur</div>
                <div class="text-[9px] text-slate-400 font-medium">Estimasi 15 Menit</div>
            </div>
        </div>

        <div class="absolute top-1/2 -left-4 grid grid-cols-3 gap-2 opacity-20">
            <div class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></div>
            <div class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></div>
            <div class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></div>
            <div class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></div>
            <div class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></div>
            <div class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></div>
        </div>

    </div>
</div>
</section>

<section class="py-20 px-[8%] bg-slate-50/50">
    <div class="text-center mb-12">
        <span class="px-4 py-1.5 bg-emerald-100 text-emerald-600 rounded-full text-xs font-bold uppercase tracking-wider">Katalog Produk</span>
        <h2 class="text-4xl font-extrabold mt-4 text-slate-800">Produk <span class="text-emerald-500">Unggulan</span> Kami</h2>
        <p class="text-slate-500 mt-3 max-w-2xl mx-auto">Temukan berbagai obat dan produk kesehatan berkualitas tinggi dengan harga terjangkau</p>
    </div>

    <div class="flex flex-wrap justify-center gap-3 mb-12">
        <button class="px-6 py-2.5 bg-emerald-500 text-white rounded-xl font-bold text-sm shadow-md shadow-emerald-100 transition-all hover:scale-105">Semua</button>
        <button class="px-6 py-2.5 bg-white text-slate-600 border border-slate-200 rounded-xl font-bold text-sm transition-all hover:border-emerald-500 hover:text-emerald-500">Obat Demam</button>
        <button class="px-6 py-2.5 bg-white text-slate-600 border border-slate-200 rounded-xl font-bold text-sm transition-all hover:border-emerald-500 hover:text-emerald-500">Vitamin & Suplemen</button>
        <button class="px-6 py-2.5 bg-white text-slate-600 border border-slate-200 rounded-xl font-bold text-sm transition-all hover:border-emerald-500 hover:text-emerald-500">Herbal</button>
        <button class="px-6 py-2.5 bg-white text-slate-600 border border-slate-200 rounded-xl font-bold text-sm transition-all hover:border-emerald-500 hover:text-emerald-500">Alat Kesehatan</button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        
        <div class="group bg-white rounded-[32px] p-5 border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-emerald-100/50 transition-all duration-500 relative overflow-hidden">
            <div class="absolute top-4 left-4 z-10">
                <span class="px-3 py-1 bg-emerald-500 text-white text-[10px] font-bold rounded-lg uppercase">Terlaris</span>
            </div>
            <button class="absolute top-4 right-4 z-10 w-10 h-10 bg-white/80 backdrop-blur-md rounded-full flex items-center justify-center text-slate-400 hover:text-red-500 transition-colors shadow-sm">
                <i class="far fa-heart"></i>
            </button>
            
            <div class="aspect-square bg-slate-50 rounded-2xl mb-5 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                <i class="fas fa-pills text-6xl text-emerald-400 opacity-80"></i>
            </div>

            <div class="space-y-1 mb-4">
                <span class="text-[10px] font-bold text-emerald-500 uppercase tracking-widest">Obat Demam</span>
                <h3 class="font-bold text-slate-800 text-lg group-hover:text-emerald-600 transition-colors">Paracetamol 500mg</h3>
                <div class="flex items-center gap-2">
                    <div class="flex text-amber-400 text-xs">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <span class="text-[11px] text-slate-400 font-medium">(234 ulasan)</span>
                </div>
            </div>

            <div class="flex items-center justify-between mt-auto">
                <div>
                    <span class="block text-xl font-extrabold text-slate-900">Rp 15.000</span>
                    <span class="text-xs text-slate-400 line-through">Rp 20.000</span>
                </div>
            </div>
            
            <button class="w-full mt-5 py-3.5 bg-emerald-500 text-white rounded-2xl font-bold text-sm flex items-center justify-center gap-2 hover:bg-emerald-600 transition-all active:scale-95 shadow-lg shadow-emerald-100">
                <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
            </button>
        </div>

        <div class="group bg-white rounded-[32px] p-5 border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-emerald-100/50 transition-all duration-500 relative">
            <div class="absolute top-4 left-4 z-10">
                <span class="px-3 py-1 bg-blue-500 text-white text-[10px] font-bold rounded-lg uppercase">Best Seller</span>
            </div>
            <button class="absolute top-4 right-4 z-10 w-10 h-10 bg-white/80 backdrop-blur-md rounded-full flex items-center justify-center text-slate-400 hover:text-red-500 transition-colors shadow-sm">
                <i class="far fa-heart"></i>
            </button>
            
            <div class="aspect-square bg-slate-50 rounded-2xl mb-5 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                <i class="fas fa-apple-whole text-6xl text-orange-400 opacity-80"></i>
            </div>

            <div class="space-y-1 mb-4">
                <span class="text-[10px] font-bold text-blue-500 uppercase tracking-widest">Vitamin & Suplemen</span>
                <h3 class="font-bold text-slate-800 text-lg group-hover:text-emerald-600 transition-colors">Vitamin C 1000mg</h3>
                <div class="flex items-center gap-2">
                    <div class="flex text-amber-400 text-xs">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <span class="text-[11px] text-slate-400 font-medium">(189 ulasan)</span>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <span class="text-xl font-extrabold text-slate-900">Rp 85.000</span>
            </div>
            
            <button class="w-full mt-5 py-3.5 bg-emerald-500 text-white rounded-2xl font-bold text-sm flex items-center justify-center gap-2 hover:bg-emerald-600 transition-all active:scale-95">
                <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
            </button>
        </div>

        <div class="group bg-white rounded-[32px] p-5 border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-emerald-100/50 transition-all duration-500 relative">
            <div class="absolute top-4 left-4 z-10">
                <span class="px-3 py-1 bg-red-500 text-white text-[10px] font-bold rounded-lg uppercase">Promo</span>
            </div>
            <button class="absolute top-4 right-4 z-10 w-10 h-10 bg-white/80 backdrop-blur-md rounded-full flex items-center justify-center text-slate-400 hover:text-red-500 transition-colors shadow-sm">
                <i class="far fa-heart"></i>
            </button>
            
            <div class="aspect-square bg-slate-50 rounded-2xl mb-5 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                <i class="fas fa-leaf text-6xl text-green-400 opacity-80"></i>
            </div>

            <div class="space-y-1 mb-4">
                <span class="text-[10px] font-bold text-red-500 uppercase tracking-widest">Herbal</span>
                <h3 class="font-bold text-slate-800 text-lg group-hover:text-emerald-600 transition-colors">Antangin JRG</h3>
                <div class="flex items-center gap-2">
                    <div class="flex text-amber-400 text-xs">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <span class="text-[11px] text-slate-400 font-medium">(312 ulasan)</span>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div>
                    <span class="block text-xl font-extrabold text-slate-900">Rp 25.000</span>
                    <span class="text-xs text-slate-400 line-through">Rp 30.000</span>
                </div>
            </div>
            
            <button class="w-full mt-5 py-3.5 bg-emerald-500 text-white rounded-2xl font-bold text-sm flex items-center justify-center gap-2 hover:bg-emerald-600 transition-all active:scale-95">
                <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
            </button>
        </div>

        <div class="group bg-white rounded-[32px] p-5 border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-emerald-100/50 transition-all duration-500 relative">
            <button class="absolute top-4 right-4 z-10 w-10 h-10 bg-white/80 backdrop-blur-md rounded-full flex items-center justify-center text-slate-400 hover:text-red-500 transition-colors shadow-sm">
                <i class="far fa-heart"></i>
            </button>
            
            <div class="aspect-square bg-slate-50 rounded-2xl mb-5 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                <i class="fas fa-thermometer-half text-6xl text-blue-400 opacity-80"></i>
            </div>

            <div class="space-y-1 mb-4">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Alat Kesehatan</span>
                <h3 class="font-bold text-slate-800 text-lg group-hover:text-emerald-600 transition-colors">Termometer Digital</h3>
                <div class="flex items-center gap-2">
                    <div class="flex text-amber-400 text-xs">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <span class="text-[11px] text-slate-400 font-medium">(98 ulasan)</span>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <span class="text-xl font-extrabold text-slate-900">Rp 45.000</span>
            </div>
            
            <button class="w-full mt-5 py-3.5 bg-emerald-500 text-white rounded-2xl font-bold text-sm flex items-center justify-center gap-2 hover:bg-emerald-600 transition-all active:scale-95">
                <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
            </button>
        </div>

    </div>

    <div class="mt-20 pt-10 border-t border-slate-200 flex flex-col md:flex-row justify-between items-center gap-6">
        <p class="text-slate-400 text-sm">© 2026 <span class="font-bold text-emerald-500">SehatFarma</span>. Seluruh hak cipta dilindungi.</p>
        <div class="flex gap-6">
            <a href="#" class="text-slate-400 hover:text-emerald-500 text-xl transition-colors"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-slate-400 hover:text-emerald-500 text-xl transition-colors"><i class="fab fa-facebook"></i></a>
            <a href="#" class="text-slate-400 hover:text-emerald-500 text-xl transition-colors"><i class="fab fa-whatsapp"></i></a>
        </div>
    </div>
</section>

<section class="py-24 px-[8%] bg-white overflow-hidden">
    <div class="flex flex-col lg:flex-row items-center gap-16">
        <div class="flex-1 space-y-8">
            <div class="inline-flex items-center px-4 py-2 bg-emerald-50 text-emerald-600 rounded-full text-xs font-bold uppercase tracking-widest">
                Tentang Kami
            </div>
            
            <h2 class="text-4xl lg:text-5xl font-extrabold text-slate-800 leading-tight">
                Apotek <span class="text-emerald-500">Terpercaya</span> untuk Kesehatan Keluarga Anda
            </h2>
            
            <div class="space-y-4 text-slate-500 text-lg leading-relaxed">
                <p>
                    SehatFarma hadir sebagai solusi kesehatan terlengkap untuk Anda dan keluarga. Dengan pengalaman lebih dari 10 tahun, kami berkomitmen menyediakan obat-obatan berkualitas dengan harga terjangkau.
                </p>
                <p>
                    Didukung oleh tim apoteker profesional bersertifikat, kami memastikan setiap produk yang Anda terima adalah asli dan berkualitas tinggi. Layanan konsultasi gratis tersedia 24/7 untuk menjawab pertanyaan kesehatan Anda.
                </p>
            </div>

            <div class="flex flex-wrap gap-4 pt-4">
                <div class="flex items-center gap-2 px-4 py-2 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold text-slate-600">
                    <i class="fas fa-check-circle text-emerald-500"></i> BPOM Certified
                </div>
                <div class="flex items-center gap-2 px-4 py-2 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold text-slate-600">
                    <i class="fas fa-check-circle text-emerald-500"></i> ISO 9001
                </div>
                <div class="flex items-center gap-2 px-4 py-2 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold text-slate-600">
                    <i class="fas fa-check-circle text-emerald-500"></i> Halal MUI
                </div>
            </div>
        </div>

        <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-6 w-full">
            <div class="p-8 bg-white border border-slate-100 rounded-[32px] shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group">
                <div class="w-14 h-14 bg-emerald-500 text-white rounded-2xl flex items-center justify-center text-2xl mb-6 shadow-lg shadow-emerald-100 group-hover:scale-110 transition-transform">
                    <i class="fas fa-users"></i>
                </div>
                <div class="text-3xl font-extrabold text-slate-800 mb-1">50.000+</div>
                <div class="text-slate-400 font-bold text-sm uppercase tracking-wider">Pelanggan Puas</div>
            </div>

            <div class="p-8 bg-white border border-slate-100 rounded-[32px] shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group">
                <div class="w-14 h-14 bg-emerald-500 text-white rounded-2xl flex items-center justify-center text-2xl mb-6 shadow-lg shadow-emerald-100 group-hover:scale-110 transition-transform">
                    <i class="fas fa-award"></i>
                </div>
                <div class="text-3xl font-extrabold text-slate-800 mb-1">10+</div>
                <div class="text-slate-400 font-bold text-sm uppercase tracking-wider">Tahun Pengalaman</div>
            </div>

            <div class="p-8 bg-white border border-slate-100 rounded-[32px] shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group">
                <div class="w-14 h-14 bg-emerald-500 text-white rounded-2xl flex items-center justify-center text-2xl mb-6 shadow-lg shadow-emerald-100 group-hover:scale-110 transition-transform">
                    <i class="fas fa-headset"></i>
                </div>
                <div class="text-3xl font-extrabold text-slate-800 mb-1">24/7</div>
                <div class="text-slate-400 font-bold text-sm uppercase tracking-wider">Layanan Pelanggan</div>
            </div>

            <div class="p-8 bg-white border border-slate-100 rounded-[32px] shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 group">
                <div class="w-14 h-14 bg-emerald-500 text-white rounded-2xl flex items-center justify-center text-2xl mb-6 shadow-lg shadow-emerald-100 group-hover:scale-110 transition-transform">
                    <i class="fas fa-shield-heart"></i>
                </div>
                <div class="text-3xl font-extrabold text-slate-800 mb-1">100%</div>
                <div class="text-slate-400 font-bold text-sm uppercase tracking-wider">Produk Asli</div>
            </div>
        </div>
    </div>
</section>


<footer class="bg-[#0b1c16] text-slate-300 py-16 px-[8%]">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
        <div class="space-y-6">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-emerald-500 rounded-xl flex items-center justify-center text-white"><i class="fas fa-plus"></i></div>
                <h2 class="text-2xl font-bold text-white">ObatKu</h2>
            </div>
            <p class="text-sm leading-relaxed text-slate-400">
                Solusi kesehatan terlengkap untuk Anda dan keluarga. Produk berkualitas, harga terjangkau.
            </p>
            <div class="flex gap-4">
                <a href="#" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-emerald-500 transition-all"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-emerald-500 transition-all"><i class="fab fa-instagram"></i></a>
                <a href="#" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-emerald-500 transition-all"><i class="fab fa-twitter"></i></a>
            </div>
        </div>

        <div>
            <h4 class="text-white font-bold mb-6">Tautan Cepat</h4>
            <ul class="space-y-4 text-sm">
                <li><a href="#" class="hover:text-emerald-500">Beranda</a></li>
                <li><a href="#" class="hover:text-emerald-500">Produk</a></li>
                <li><a href="#" class="hover:text-emerald-500">Tentang Kami</a></li>
                <li><a href="#" class="hover:text-emerald-500">Kontak</a></li>
            </ul>
        </div>

        <div>
            <h4 class="text-white font-bold mb-6">Kategori</h4>
            <ul class="space-y-4 text-sm">
                <li><a href="#" class="hover:text-emerald-500">Obat Demam</a></li>
                <li><a href="#" class="hover:text-emerald-500">Vitamin & Suplemen</a></li>
                <li><a href="#" class="hover:text-emerald-500">Herbal</a></li>
                <li><a href="#" class="hover:text-emerald-500">Alat Kesehatan</a></li>
            </ul>
        </div>

        <div>
            <h4 class="text-white font-bold mb-6">Hubungi Kami</h4>
            <ul class="space-y-4 text-sm">
                <li class="flex items-start gap-3">
                    <i class="fas fa-map-marker-alt text-emerald-500 mt-1"></i>
                    <span>Jl. Kesehatan No. 123, Jakarta Selatan 12345</span>
                </li>
                <li class="flex items-center gap-3">
                    <i class="fas fa-phone-alt text-emerald-500"></i>
                    <span>0812-3456-7890</span>
                </li>
                <li class="flex items-center gap-3">
                    <i class="far fa-envelope text-emerald-500"></i>
                    <span>info@sehatfarma.id</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="border-t border-white/5 mt-16 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-slate-500">
        <p>© 2026 ObatKu. Semua hak dilindungi.</p>
        <div class="flex gap-6">
            <a href="#">Syarat & Ketentuan</a>
            <a href="#">Kebijakan Privasi</a>
        </div>
    </div>
</footer>

<script>
function toggleProfile() {
    document.getElementById('profileBox').classList.toggle('active');
}
window.onclick = function(e) {
    const profileBox = document.getElementById('profileBox');
    if (!profileBox.contains(e.target)) {
        profileBox.classList.remove('active');
    }
}
</script>

</body>
</html>

<script>
function toggleProfile() {
    document.getElementById('profileBox').classList.toggle('active');
}
// Close dropdown when clicking outside
window.onclick = function(e) {
    const profileBox = document.getElementById('profileBox');
    if (!profileBox.contains(e.target)) {
        profileBox.classList.remove('active');
    }
}
</script>

</body>
</html>

<style>
        :root {
            --primary: #10b981;
            --primary-dark: #059669;
            --soft-green: #eefdf5;
            --dark: #1e293b;
            --text-light: #64748b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: #ffffff;
            color: var(--dark);
        }

        /* NAVBAR - Enhanced with Search Bar */
        nav {
            padding: 0.8rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(226, 232, 240, 0.5);
        }

        .search-container {
            position: relative;
            width: 350px;
            margin-left: 20px;
        }

        .search-input {
            width: 100%;
            padding: 10px 15px 10px 45px;
            border-radius: 14px;
            border: 1px solid #e2e8f0;
            background: #f8fafc;
            font-size: 0.9rem;
            transition: all 0.3s;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        /* LOGO & MENU */
        .logo-container { display: flex; align-items: center; gap: 10px; }
        .logo-icon {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white; width: 38px; height: 38px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 12px; font-size: 1.2rem;
        }

        .menu { display: flex; list-style: none; gap: 2rem; }
        .menu a { text-decoration: none; color: var(--dark); font-weight: 600; font-size: 0.9rem; opacity: 0.8; transition: 0.3s; }
        .menu a:hover { color: var(--primary); opacity: 1; }

        /* DROPDOWN */
        .profile-trigger {
            display: flex; align-items: center; gap: 10px;
            background: white; padding: 6px 14px; border-radius: 50px;
            border: 1px solid #f1f5f9; cursor: pointer; transition: 0.3s;
        }
        .profile.active .dropdown { display: block; }
        .dropdown {
            position: absolute; top: calc(100% + 15px); right: 0;
            background: white; min-width: 200px; border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1); display: none;
            overflow: hidden; border: 1px solid #f1f5f9; animation: slideUp 0.3s ease;
        }

        @keyframes slideUp { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        /* HERO Gradient */
        .hero { 
            padding-top: 100px; 
            background: radial-gradient(circle at 10% 10%, #eefdf5 0%, #ffffff 40%);
        }


        :root {
            --primary: #10b981;
            --primary-dark: #059669;
            --soft-green: #eefdf5;
            --dark: #1e293b;
            --text-light: #64748b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: #ffffff;
            color: var(--dark);
        }

        /* NAVBAR - Enhanced with Glassmorphism */
        nav {
            padding: 1rem 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-icon {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 1.2rem;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
        }

        .logo-text b { display: block; font-size: 1.1rem; color: var(--dark); letter-spacing: -0.5px; }
        .logo-text span { font-size: 0.75rem; color: var(--text-light); }

        .menu {
            display: flex;
            list-style: none;
            gap: 2.5rem;
        }

        .menu a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 600;
            font-size: 0.9rem;
            transition: 0.3s;
            opacity: 0.8;
        }

        .menu a:hover { color: var(--primary); opacity: 1; }

        /* PROFILE DROPDOWN STYLING */
        .profile { position: relative; cursor: pointer; }
        .profile-trigger {
            display: flex;
            align-items: center;
            gap: 10px;
            background: white;
            padding: 6px 14px;
            border-radius: 50px;
            border: 1px solid #f1f5f9;
            box-shadow: 0 2px 6px rgba(0,0,0,0.02);
            transition: 0.3s;
        }
        .profile-trigger:hover { border-color: var(--primary); }

        .dropdown {
            position: absolute;
            top: calc(100% + 15px);
            right: 0;
            background: white;
            min-width: 180px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            display: none;
            overflow: hidden;
            border: 1px solid #f1f5f9;
            animation: slideUp 0.3s ease;
        }
        
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .profile.active .dropdown { display: block; }
        
        .dropdown a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 20px;
            text-decoration: none;
            color: var(--dark);
            font-size: 0.85rem;
            font-weight: 500;
        }
        .dropdown a:hover { background: var(--soft-green); color: var(--primary); }

        /* BUTTONS */
        .btn-keranjang {
            background: var(--primary);
            color: white;
            padding: 10px 20px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.85rem;
            transition: 0.3s;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
        }
        .btn-keranjang:hover { background: var(--primary-dark); transform: translateY(-2px); }

        .btn-login {
            background: #f8fafc;
            color: var(--dark);
            padding: 10px 18px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.85rem;
            border: 1px solid #e2e8f0;
            transition: 0.3s;
        }
        .btn-login:hover { background: #f1f5f9; }

        /* HERO & CATALOG (Keeping your existing styles but cleaning up) */
        .hero { padding-top: 120px; min-height: 90vh; display: flex; align-items: center; padding-inline: 8%; background: radial-gradient(circle at 80% 20%, #eefdf5 0%, #ffffff 50%); }
        .hero-content h1 { font-size: 4rem; font-weight: 800; line-height: 1.1; margin-bottom: 1.5rem; letter-spacing: -2px; }
        .hero-content h1 span { color: var(--primary); }
    </style>
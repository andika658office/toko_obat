<?php
include '../config/conn.php';

//ambil data dari produk tapi maksimal 10
// Ambil maksimal 10 produk
$sql = "SELECT id_obat, nama_obat, harga, stok, expired_date 
        FROM obat 
        ORDER BY id_obat ASC 
        LIMIT 30";
$result = mysqli_query($db, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>SehatFarma | Kasir</title>
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<!-- HEADER -->
<div class="header">
    <div class="logo">
        <span class="logo-icon">+</span> ObatKu
    </div>

    <div class="search">
        <input type="text" placeholder="Cari obat, vitamin, suplemen...">
    </div>


    <div class="header-right">
        <a href="laporan.php" class="btn-gear" title="Pengaturan">
            <i class="fas fa-gear"></i>
        </a>

        <a href="../account/logout.php" class="btn-logout" title="Logout">
            <i class="fas fa-right-from-bracket"></i>
        </a>

        <div class="user">Halo, Admin 1</div>
    </div>
</div>



<!-- HERO -->
<div class="hero">
    <span>🔥 Promo Bulan Ini</span>
    <h1>Kesehatan Keluarga<br>Dimulai dari Sini</h1>
    <p>
        Temukan obat, vitamin, dan kebutuhan kesehatan
        dengan harga terbaik.
    </p>
    <button>Lihat Promo</button>
</div>

<!-- KATEGORI -->
<div class="section">
    <h2>Kategori Obat</h2>
    <div class="categories">
        <div class="category">
            <div class="icon">💊</div>
            Obat Umum
        </div>
        <div class="category">
            <div class="icon">❤️</div>
            Jantung
        </div>
        <div class="category">
            <div class="icon">👶</div>
            Anak & Bayi
        </div>
        <div class="category">
            <div class="icon">🌿</div>
            Herbal
        </div>
        <div class="category">
            <div class="icon">🤒</div>
            Demam & Flu
        </div>
        <div class="category">
            <div class="icon">👁️</div>
            Mata & THT
        </div>
    </div>
</div>

<!-- PRODUK -->
<div class="section">
    <h2>Semua Produk</h2>
    <div class="products">
        
                <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="product">
                <img src="https://cdn-icons-png.flaticon.com/512/822/822143.png" width="80">
                <h4><?php echo htmlspecialchars($row['nama_obat']); ?></h4>
                <div class="price">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></div>
                <button>Tambah</button>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>Tidak ada produk ditemukan.</p>
    <?php endif; ?>
        </div>

</div>

<!-- FOOTER -->
<div class="footer">
    <div class="footer-grid">

        <!-- ABOUT -->
        <div>
            <div class="footer-logo">
                <span>+</span> ObatKu
            </div>
            <p>
                toko obat terpercaya menyediakan obat-obatan,
                vitamin, dan kebutuhan kesehatan keluarga Anda.
            </p>
        </div>

        <!-- INFORMASI -->
        <div>
            <h4>Informasi</h4>
            <ul>
                <li><span>📍</span> Jl. Kesehatan No. 123, Jakarta</li>
                <li><span>📞</span> (021) 555-1234</li>
                <li><span>⏰</span> Buka: 07:00 - 22:00 WIB</li>
            </ul>
        </div>

        <!-- LAYANAN -->
        <div>
            <h4>Layanan</h4>
            <ul>
                <li>Cek Kesehatan</li>
                <li>Program Loyalitas</li>
            </ul>
        </div>

    </div>

    <div class="footer-bottom">
        © 2026 SehatFarma. Semua hak dilindungi.
    </div>
</div>

</body>
</html>

<style>
* {
    box-sizing: border-box;
}
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: #f5f8f6;
    color: #1f2937;
}

/* HEADER */
.header{
    position: sticky;   
    top: 0;             
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #fff;
    padding: 15px 25px;
    border-bottom: 1px solid #e5e7eb;
    z-index: 1000;
}

.logo{
    font-size:20px;
    font-weight:800;
    color:#10b981;
}

.logo span{
    background:#10b981;
    color:#fff;
    padding:6px 10px;
    border-radius:8px;
    margin-right:6px;
}

.search input{
    width:320px;
    padding:10px 14px;
    border-radius:10px;
    border:1px solid #ddd;
}

.header-right{
    display:flex;
    align-items:center;
    gap:15px;
}

.btn-gear{
    display:flex;
    align-items:center;
    justify-content:center;
    width:40px;
    height:40px;
    background:#f1f5f9;
    border-radius:10px;
    color:#555;
    text-decoration:none;
    cursor:pointer;
    border:none;
}

.btn-gear:hover{
    background:#10b981;
    color:#fff;
}


.user{
    font-weight:600;
    color:#333;
}


/* HERO */
.hero {
    margin: 30px;
    border-radius: 25px;
    padding: 50px;
    color: white;
    background: linear-gradient(
        rgba(0,0,0,0.35),
        rgba(0,0,0,0.35)
    ),
    url('https://images.unsplash.com/photo-1584308666744-24d5c474f2ae') center/cover;
}
.hero span {
    background: #f97316;
    padding: 6px 14px;
    border-radius: 999px;
    font-size: 13px;
}
.hero h1 {
    font-size: 40px;
    margin: 15px 0;
}
.hero p {
    max-width: 500px;
    line-height: 1.6;
}
.hero button {
    margin-top: 20px;
    padding: 12px 25px;
    background: #22c55e;
    border: none;
    border-radius: 999px;
    color: white;
    font-weight: bold;
    cursor: pointer;
}

/* SECTION */
.section {
    margin: 40px 30px;
}
.section h2 {
    margin-bottom: 20px;
}

/* KATEGORI */
.categories {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
    gap: 20px;
}
.category {
    background: white;
    border-radius: 20px;
    padding: 25px;
    text-align: center;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}
.category .icon {
    width: 45px;
    height: 45px;
    margin: auto;
    border-radius: 50%;
    background: #dcfce7;
    color: #16a34a;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    margin-bottom: 10px;
}

/* PRODUK */
.products {
    display: grid;
    grid-template-columns: repeat(5, minmax(200px, 1fr));
    gap: 25px;
}
.product {
    background: white;
    border-radius: 25px;
    padding: 20px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.05);
}
.product img {
    width: 100%;
    height: 140px;
    object-fit: contain;
}
.product h4 {
    margin: 10px 0 5px;
}
.price {
    color: #16a34a;
    font-weight: bold;
}
.product button {
    margin-top: 10px;
    width: 100%;
    padding: 10px;
    border-radius: 999px;
    border: none;
    background: #22c55e;
    color: white;
    cursor: pointer;
}

/* FOOTER */
.footer {
    background: #ffffff;
    border-top: 1px solid #e5e7eb;
    padding: 40px 30px 20px;
    margin-top: 60px;
}

.footer-grid {
    display: grid;
    grid-template-columns: 2fr 1.5fr 1.5fr;
    gap: 40px;
}

.footer-logo {
    display: flex;
    align-items: center;
    font-size: 20px;
    font-weight: bold;
    color: #16a34a;
    margin-bottom: 10px;
}

.footer-logo span {
    background: #16a34a;
    color: white;
    width: 34px;
    height: 34px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    margin-right: 8px;
}

.footer p {
    font-size: 14px;
    color: #6b7280;
    line-height: 1.6;
}

.footer h4 {
    margin-bottom: 12px;
}

.footer ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer ul li {
    margin-bottom: 10px;
    font-size: 14px;
    color: #6b7280;
    display: flex;
    align-items: center;
    gap: 8px;
}

.footer ul li span {
    color: #16a34a;
}

.footer-bottom {
    text-align: center;
    font-size: 13px;
    color: #9ca3af;
    margin-top: 30px;
    border-top: 1px solid #e5e7eb;
    padding-top: 15px;
}

</style>
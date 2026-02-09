<?php
include '../config/conn.php';

//definisikan variabel keyword untuk menampung kata kunci pencarian
$keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($db, $_GET['keyword']) : '';
// LOGIKA QUERY
if ($keyword !== '') {
    // Jika user mengetik sesuatu, cari obat berdasarkan awalan huruf
    $sql = "SELECT id_obat, nama_obat, harga, stok, expired_date 
            FROM obat 
            WHERE nama_obat LIKE '$keyword%' 
            ORDER BY nama_obat ASC";
} else {

// Ambil data produk awal untuk ditampilkan di grid bawah
$sql = "SELECT id_obat, nama_obat, harga, stok, expired_date 
        FROM obat 
        ORDER BY id_obat ASC 
        LIMIT 30";
}
$result = mysqli_query($db, $sql);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>SehatFarma | Kasir</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* CSS ASLI KAMU */
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
        .header {
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

        .logo {
            font-size: 20px;
            font-weight: 800;
            color: #10b981;
        }

        .logo span {
            background: #10b981;
            color: #fff;
            padding: 6px 10px;
            border-radius: 8px;
            margin-right: 6px;
        }

        /* SEARCH BOX */
        .search {
            position: relative;
        }

        /* Penting untuk dropdown */
        .search input {
            width: 320px;
            padding: 10px 14px;
            border-radius: 10px;
            border: 1px solid #ddd;
            outline: none;
        }

        /* STYLE DROPDOWN HASIL PENCARIAN (BARU) */
        #hasil-pencarian {
            position: absolute;
            top: 45px;
            left: 0;
            width: 100%;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            z-index: 1001;
            overflow: hidden;
            display: none;
            border: 1px solid #e5e7eb;
        }

        .result-item {
            padding: 12px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #f1f5f9;
            cursor: pointer;
            transition: 0.2s;
        }

        .result-item:hover {
            background: #f0fdf4;
        }

        .result-item .name {
            font-weight: 600;
            color: #1f2937;
            display: block;
        }

        .result-item .price-tag {
            font-size: 13px;
            color: #10b981;
            font-weight: bold;
        }

        .no-result {
            padding: 15px;
            text-align: center;
            color: #9ca3af;
            font-size: 14px;
        }

        /* HERO, SECTION, PRODUCTS (KODE ASLI LANJUTAN) */
        .header-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .btn-gear,
        .btn-logout {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: #f1f5f9;
            border-radius: 10px;
            color: #555;
            text-decoration: none;
        }

        .user {
            font-weight: 600;
            color: #333;
        }

        .hero {
            margin: 30px;
            border-radius: 25px;
            padding: 50px;
            color: white;
            background: linear-gradient(rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.35)), url('https://images.unsplash.com/photo-1584308666744-24d5c474f2ae') center/cover;
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

        .section {
            margin: 40px 30px;
        }

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
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
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

        .products {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 25px;
        }

        .product {
            background: white;
            border-radius: 25px;
            padding: 20px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
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

        .footer-bottom {
            text-align: center;
            font-size: 13px;
            color: #9ca3af;
            margin-top: 30px;
            border-top: 1px solid #e5e7eb;
            padding-top: 15px;
        }

        .footer ul {
            list-style: none;
            padding: 0;
        }

        .footer ul li {
            margin-bottom: 10px;
            font-size: 14px;
            color: #6b7280;
            display: flex;
            align-items: center;
            gap: 8px;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="logo"><span>+</span> ObatKu</div>

       <div class="search">
    <input type="text" id="keyword" placeholder="Cari obat (ketik huruf awal)..." autocomplete="off">
    <div id="hasil-pencarian"></div>
</div>

        <div class="header-right">
            <a href="laporan.php" class="btn-gear" title="Pengaturan"><i class="fas fa-gear"></i></a>
            <a href="../account/logout.php" class="btn-logout" title="Logout"><i
                    class="fas fa-right-from-bracket"></i></a>
            <div class="user">Halo, Admin 1</div>
        </div>
    </div>

    <div class="hero">
        <span>🔥 Promo Bulan Ini</span>
        <h1>Kesehatan Keluarga<br>Dimulai dari Sini</h1>
        <p>Temukan obat, vitamin, dan kebutuhan kesehatan dengan harga terbaik.</p>
        <button>Lihat Promo</button>
    </div>

    <div class="section">
        <h2>Kategori Obat</h2>
        <div class="categories">
            <div class="category">
                <div class="icon">💊</div>Obat Umum
            </div>
            <div class="category">
                <div class="icon">❤️</div>Jantung
            </div>
            <div class="category">
                <div class="icon">👶</div>Anak & Bayi
            </div>
            <div class="category">
                <div class="icon">🌿</div>Herbal
            </div>
            <div class="category">
                <div class="icon">🤒</div>Demam & Flu
            </div>
            <div class="category">
                <div class="icon">👁️</div>Mata & THT
            </div>
        </div>
    </div>

    <div class="section" id="semua-produk"> <h2>
        <?php echo ($keyword !== '') ? "Hasil Pencarian: '$keyword'" : "Semua Produk"; ?>
    </h2>
    
    <?php if ($keyword !== ''): ?>
        <a href="homeback.php" style="color: #10b981; text-decoration: none; font-size: 14px;">
            <i class="fas fa-times"></i> Hapus Pencarian
        </a>
    <?php endif; ?>

    <div class="products">
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="product">
                    <img src="https://cdn-icons-png.flaticon.com/512/822/822143.png" alt="Obat">
                    <h4><?php echo htmlspecialchars($row['nama_obat']); ?></h4>
                    <div class="price">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></div>
                    <button>Tambah</button> </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Obat tidak ditemukan.</p>
        <?php endif; ?>
    </div>
</div>

    <div class="footer">
        <div class="footer-grid">
            <div>
                <div class="footer-logo"><span>+</span> ObatKu</div>
                <p>Toko obat terpercaya menyediakan kebutuhan kesehatan keluarga Anda.</p>
            </div>
            <div>
                <h4>Informasi</h4>
                <ul>
                    <li><span>📍</span> Jl. Kesehatan No. 123, Jakarta</li>
                    <li><span>📞</span> (021) 555-1234</li>
                </ul>
            </div>
            <div>
                <h4>Layanan</h4>
                <ul>
                    <li>Cek Kesehatan</li>
                    <li>Program Loyalitas</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">© 2026 SehatFarma. Semua hak dilindungi.</div>
    </div>

   <script>
    const inputKeyword = document.getElementById('keyword');
    const hasilDiv = document.getElementById('hasil-pencarian');

    // Fitur Search Autocomplete (AJAX)
    inputKeyword.addEventListener('keyup', function () {
        let kataKunci = inputKeyword.value;
        if (kataKunci.length > 0) {
            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    hasilDiv.innerHTML = xhr.responseText;
                    hasilDiv.style.display = 'block';
                }
            };
            xhr.open('POST', 'cari.php', true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("keyword=" + kataKunci);
        } else {
            hasilDiv.style.display = 'none';
        }
    });

    // FUNGSI BARU: Klik hasil pencarian lalu arahkan ke grid produk
    function pilihObat(namaObat) {
        // 1. Sembunyikan dropdown
        hasilDiv.style.display = 'none';
        inputKeyword.value = namaObat;

        // 2. Cari elemen kartu produk berdasarkan nama h4
        const daftarProduk = document.querySelectorAll('.product h4');
        let ditemukan = false;

        daftarProduk.forEach((item) => {
            if (item.innerText.trim().toLowerCase() === namaObat.toLowerCase()) {
                // 3. Scroll ke posisi obat tersebut
                item.scrollIntoView({ behavior: 'smooth', block: 'center' });

                // 4. Beri efek highlight visual
                const kartu = item.parentElement;
                kartu.style.transition = "0.5s";
                kartu.style.boxShadow = "0 0 20px #10b981";
                kartu.style.transform = "scale(1.05)";

                setTimeout(() => {
                    kartu.style.boxShadow = "0 6px 15px rgba(0, 0, 0, 0.05)";
                    kartu.style.transform = "scale(1)";
                }, 2000);

                ditemukan = true;
            }
        });

        if(!ditemukan) {
            // Jika obat tidak ada di grid (mungkin kena LIMIT 30), arahkan via URL saja
            window.location.href = "homeback.php?keyword=" + namaObat + "#semua-produk";
        }
    }

    // Sembunyikan dropdown jika user klik di luar area input
    document.addEventListener('click', function (e) {
        if (!inputKeyword.contains(e.target) && !hasilDiv.contains(e.target)) {
            hasilDiv.style.display = 'none';
        }
    });
</script>

</body>

</html>
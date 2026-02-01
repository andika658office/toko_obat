<?php
include 'config/app.php';
$data = mysqli_query($db, "SELECT * FROM obat");


session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}


$username = $_SESSION['username'] ?? 'User';
$role     = $_SESSION['role'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Obat</title>
</head>
<body>

<nav>
    <div class="logo">Toko Obat Sehat</div>

    <div class="nav-right">
        <ul class="menu">
            <?php if($role == 'admin'): ?>
                <li><a href="home.php">Home</a></li>
                <li><a href="data_obat.php">Data Obat</a></li>
            <?php endif; ?>
            <li><a href="data_transaksi.php">Transaksi</a></li>
            <li><a href="laporan.php">Laporan</a></li>
        </ul>

        <div class="profile" id="profileBox">
            <div class="profile-name" onclick="toggleProfile()">
                👤 <?= htmlspecialchars($username); ?>
                <span class="arrow">▶</span>
            </div>

            <div class="dropdown">
                <a href="profil.php">Profil Saya</a>
                         <a href="logout.php">Logout</a>
           
            </div>
        </div>
    </div>
</nav>


<h2 class="judul-halaman">Data Obat</h2>
<div class="top-action">
    <a href="tambah_obat.php" class="btn-tambah">+ Tambah Obat</a>
</div>


<div class="card-container">

<?php $no=1; while($row=mysqli_fetch_assoc($data)) : ?>
    <div class="obat-card">
        <div class="card-header">
            <span class="nomor">#<?= $no++ ?></span>
            <span class="jenis"><?= htmlspecialchars($row['jenis']) ?></span>
        </div>

        <h3 class="nama"><?= htmlspecialchars($row['nama_obat']) ?></h3>

        <div class="info">
            <p><b>Stok:</b> <?= $row['stok'] ?></p>
            <p><b>Harga:</b> Rp <?= number_format($row['harga']) ?></p>
            <p><b>Expired:</b> <?= $row['exp'] ?></p>
        </div>

        <div class="aksi">
            <a href="edit_obat.php?id=<?= $row['id_obat'] ?>" class="btn edit">Edit</a>
            <a href="hapus_obat.php?id=<?= $row['id_obat'] ?>" 
               class="btn hapus"
               onclick="return confirm('Hapus data?')">Hapus</a>
        </div>
    </div>
<?php endwhile; ?>

</div>


<footer>
    © 2026 Toko Obat Sehat | Aplikasi Sederhana
</footer> 

</body>
</html>

<style>
/* ===== GLOBAL ===== */
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: linear-gradient(to bottom, #e8f5e9, #f4f8f6);
}

/* ===== NAVBAR ===== */
nav {
    background: #2ecc71;
    padding: 15px 30px;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
     animation: slideDown 0.6s ease-out forwards;
}

.logo {
    font-size: 20px;
    font-weight: bold;
}

.nav-right {
    display: flex;
    align-items: center;
    gap: 25px;
}

.menu {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

.menu li {
    margin-left: 20px;
}

.menu li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

.menu li a:hover {
    text-decoration: underline;
}

/* ===== PROFILE ===== */
.profile {
    position: relative;
}

.profile-name {
    background: linear-gradient(135deg, #3498db, #2F6FE4);
    color: #fff;
    padding: 8px 14px;
    border-radius: 20px;
    cursor: pointer;
    font-weight: bold;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: 0.3s;
}

.profile-name:hover {
    transform: translateY(-2px);
}

.arrow {
    font-size: 12px;
    transition: transform 0.3s;
}

.dropdown {
    position: absolute;
    right: 0;
    top: 48px;
    background: #fff;
    min-width: 180px;
    border-radius: 10px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    display: none;
    overflow: hidden;
    z-index: 1000;
}

.dropdown a {
    display: block;
    padding: 12px 15px;
    color: #333;
    text-decoration: none;
}

.dropdown a:hover {
    background: #f1f5f9;
}

.profile.active .dropdown {
    display: block;
}

.profile.active .arrow {
    transform: rotate(90deg);
}

.judul-halaman {
    text-align: center;
    font-size: 28px;
    font-weight: bold;
    color: #2c3e50;
    margin: 30px 0 20px;
    position: relative;
}

/* ===== CARD OBAT ===== */
.card-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 25px;
    padding: 20px 30px;
}

.obat-card {
    background: white;
    border-radius: 18px;
    padding: 18px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    transition: transform 0.3s, box-shadow 0.3s;
}

.obat-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 40px rgba(0,0,0,0.15);
}

.card-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.nomor {
    font-weight: bold;
    color: #2ecc71;
}

.jenis {
    background: #ecfdf5;
    color: #16a34a;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 12px;
}

.nama {
    margin: 10px 0;
    color: #2c3e50;
}

.info p {
    margin: 6px 0;
    color: #555;
}

.aksi {
    margin-top: 15px;
    display: flex;
    gap: 10px;
}

.btn {
    flex: 1;
    text-align: center;
    padding: 8px;
    border-radius: 12px;
    text-decoration: none;
    font-weight: bold;
    transition: 0.3s;
}

.btn.edit {
    background: #3498db;
    color: white;
}

.btn.hapus {
    background: #e74c3c;
    color: white;
}

.btn:hover {
    opacity: 0.9;
}

/* ===== BUTTON TAMBAH OBAT ===== */
.top-action {
    padding: 0 30px;
    margin-bottom: 20px;
    display: flex;
    justify-content: flex-end;
}

.btn-tambah {
    display: inline-block;
    background: linear-gradient(135deg, #2ecc71, #27ae60);
    color: white;
    padding: 12px 22px;
    border-radius: 30px;
    text-decoration: none;
    font-weight: bold;
    box-shadow: 0 8px 20px rgba(46,204,113,0.4);
    transition: 0.3s;
}

.btn-tambah:hover {
    transform: translateY(-3px);
    box-shadow: 0 14px 28px rgba(46,204,113,0.55);
}



/* ===== ANIMASI PAGE LOAD ===== */
@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideUpFooter {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ===== FOOTER ===== */
footer {
    background: #2c3e50;
    color: white;
    text-align: center;
    padding: 15px 0;
    animation: slideUpFooter 0.6s ease-out forwards;
    margin-top: 432px;
}
</style>

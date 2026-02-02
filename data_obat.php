<?php
session_start();

include 'config/app.php';
include 'asset/style.php';
$data = mysqli_query($db, "SELECT * FROM obat");



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



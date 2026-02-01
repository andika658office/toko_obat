<?php
include 'config/app.php';
$data = mysqli_query($db, "
    SELECT transaksi.*, obat.nama_obat 
    FROM transaksi 
    JOIN obat ON transaksi.id_obat = obat.id_obat
");

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}


$username = $_SESSION['username'] ?? 'User';
$role     = $_SESSION['role'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
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

<div class="top-action">
    <a href="transaksi_obat.php" class="btn-tambah">+ Tambah Transaksi</a>
</div>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama Obat</th>
        <th>Jumlah</th>
        <th>Total</th>
        <th>Tanggal</th>
    </tr>

    <?php $no=1; while ($row = mysqli_fetch_assoc($data)) { ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama_obat']; ?></td>
        <td><?= $row['jumlah']; ?></td>
        <td>Rp <?= number_format($row['total']); ?></td>
        <td><?= $row['tanggal']; ?></td>
    </tr>
    <?php } ?>
</table>

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

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 80px;
    background: #ffffff;
    font-family: Arial, sans-serif;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

th {
    background: #BFC6C4;
    color: black;
    padding: 12px;
    text-align: center;
    font-size: 14px;
}

td {
    padding: 10px;
    border-bottom: 1px solid #eaeaea;
    text-align: center;
    font-size: 13px;
}

tr:nth-child(even) {
    background: #f9f9f9;
}

tr:hover {
    background: #e8f5e9;
    transition: 0.2s;
}

/* Total Harga */
td:nth-child(4) {
    font-weight: bold;
    color: #27ae60;
}

/* Responsive */
@media (max-width: 768px) {
    table {
        font-size: 12px;
    }
}


/* ===== BUTTON TAMBAH OBAT ===== */
.top-action {
    padding: 0 30px;
    margin-bottom: 20px;
    margin-top: 50px;
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
    margin-top: 619px;
}
</style>

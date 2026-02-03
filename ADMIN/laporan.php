<?php
session_start();
include 'config/app.php';

/* ===== CEK LOGIN ===== */
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'] ?? 'User';
$role     = $_SESSION['role'] ?? '';

/* ===== FILTER TANGGAL ===== */
$dari   = $_GET['dari'] ?? '';
$sampai = $_GET['sampai'] ?? '';

if ($dari && $sampai) {
    $sql = "
        SELECT transaksi.*, obat.nama_obat 
        FROM transaksi 
        JOIN obat ON transaksi.id_obat = obat.id_obat
        WHERE DATE(tanggal) BETWEEN '$dari' AND '$sampai'
        ORDER BY tanggal DESC
    ";
} else {
    $sql = "
        SELECT transaksi.*, obat.nama_obat 
        FROM transaksi 
        JOIN obat ON transaksi.id_obat = obat.id_obat
        ORDER BY tanggal DESC
    ";
}

$data = mysqli_query($db, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Laporan Transaksi Obat</title>

<style>
/* ===== RESET & LAYOUT ===== */
* { box-sizing: border-box; }

body {
    margin: 0;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    font-family: Arial, sans-serif;
    background: #f4f6f8;
}

main {
    flex: 1;
    padding: 20px;
}

/* ===== NAVBAR ===== */
nav {
    background: #2ecc71;
    padding: 15px 30px;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
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

.menu li { margin-left: 20px; }

.menu li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

.menu li a:hover { text-decoration: underline; }

/* ===== PROFILE ===== */
.profile { position: relative; }

.profile-name {
    background: linear-gradient(135deg,#3498db,#2F6FE4);
    padding: 8px 14px;
    border-radius: 20px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
}

.arrow {
    font-size: 12px;
    transition: 0.3s;
}

.dropdown {
    position: absolute;
    right: 0;
    top: 48px;
    background: white;
    min-width: 180px;
    border-radius: 10px;
    box-shadow: 0 8px 25px rgba(0,0,0,.2);
    display: none;
    overflow: hidden;
    z-index: 999;
}

.dropdown a {
    padding: 12px 15px;
    display: block;
    color: #333;
    text-decoration: none;
}

.dropdown a:hover { background: #f1f5f9; }

.profile.active .dropdown { display: block; }
.profile.active .arrow { transform: rotate(90deg); }

/* ===== FORM ===== */
form {
    margin-bottom: 15px;
}

input[type=date] {
    padding: 6px;
}

button {
    padding: 6px 14px;
    background: #2ecc71;
    border: none;
    color: white;
    cursor: pointer;
}

button:hover { background: #27ae60; }

/* ===== TABLE ===== */
table {
    width: 100%;
    border-collapse: collapse;
    background: white;
}

th {
    background: #2ecc71;
    color: white;
    padding: 10px;
}

td {
    padding: 8px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

tr:nth-child(even) { background: #f9f9f9; }

.total {
    font-weight: bold;
    background: #e8f5e9;
}

/* ===== FOOTER ===== */
footer {
    background: #2c3e50;
    color: white;
    text-align: center;
    padding: 15px 0;
    margin-top: auto;
}

/* ===== PRINT ===== */
@media print {
    nav, footer, form, button {
        display: none;
    }
}
</style>

<script>
function toggleProfile() {
    document.getElementById('profileBox').classList.toggle('active');
}
</script>
</head>

<body>

<nav>
    <div class="logo">Toko Obat Sehat</div>

    <div class="nav-right">
        <ul class="menu">
            <?php if ($role == 'admin'): ?>
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

<main>
    <h2>Laporan Transaksi Obat</h2>

    <form method="GET">
        Dari:
        <input type="date" name="dari" value="<?= $dari ?>">
        Sampai:
        <input type="date" name="sampai" value="<?= $sampai ?>">
        <button type="submit">Tampilkan</button>
        <button type="button" onclick="window.print()">Cetak</button>
    </form>

    <table>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Obat</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>

        <?php
        $no = 1;
        $grand_total = 0;

        if (mysqli_num_rows($data) > 0):
            while ($row = mysqli_fetch_assoc($data)):
                $grand_total += $row['total'];
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= date('d-m-Y H:i', strtotime($row['tanggal'])); ?></td>
            <td><?= $row['nama_obat']; ?></td>
            <td><?= $row['jumlah']; ?></td>
            <td>Rp <?= number_format($row['total']); ?></td>
        </tr>
        <?php endwhile; else: ?>
        <tr>
            <td colspan="5">Data tidak ditemukan</td>
        </tr>
        <?php endif; ?>

        <tr class="total">
            <td colspan="4">TOTAL PEMASUKAN</td>
            <td>Rp <?= number_format($grand_total); ?></td>
        </tr>
    </table>
</main>

<footer>
    © 2026 Toko Obat Sehat | Aplikasi Sederhana
</footer>

</body>
</html>

<?php
session_start();
include '../config/conn.php';

// Pastikan user login
if (!isset($_SESSION['id_user'])) {
    die("error: User belum login");
}

// Hitung total produk
$sqlProduk = "SELECT COUNT(*) AS total_produk FROM obat";
$resProduk = mysqli_query($db, $sqlProduk);
$totalProduk = mysqli_fetch_assoc($resProduk)['total_produk'];

// Hitung total pendapatan
$sqlPendapatan = "SELECT SUM(total) AS total_pendapatan FROM detail_transaksi";
$resPendapatan = mysqli_query($db, $sqlPendapatan);
$totalPendapatan = mysqli_fetch_assoc($resPendapatan)['total_pendapatan'] ?? 0;



// Ambil tanggal dari form, default hari ini
$tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');

// Query transaksi + detail untuk tanggal tertentu
$sql = "SELECT t.id_transaksi, t.tanggal, u.username, 
               d.id_detail, o.nama_obat, d.jumlah, d.harga_satuan, d.total
        FROM transaksi t
        JOIN user u ON t.id_user = u.id_user
        JOIN detail_transaksi d ON t.id_transaksi = d.id_transaksi
        JOIN obat o ON d.id_obat = o.id_obat
        WHERE DATE(t.tanggal) = '$tanggal'
        ORDER BY t.tanggal DESC";

$result = mysqli_query($db, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Laporan Transaksi Hari Ini</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="style.css">
  <?php include '../asset/siderbar.php'?>
</head>
<body class="p-4">

      <div class="content" style="margin-left:220px; padding:20px;">

  <h2 class="mb-4">Transaksi Penjualan</h2>

   <!-- CARD -->
    <div class="cards">
        <div class="card"><h4>Total Produk</h4><h2><?php echo $totalProduk; ?></h2></div>
        <div class="card"><h4>Total Pendapatan</h4><h2>Rp <?php echo number_format($totalPendapatan, 0, ',', '.'); ?></h2></div>
        
    </div>

  <!-- Form filter tanggal -->
  <form method="get" class="mb-3">
    <div class="row g-2">
      <div class="col-auto">
        <input type="date" name="tanggal" value="<?= $tanggal ?>" class="form-control">
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-success">Cek</button>
      </div>
    </div>
  </form>

  <!-- Tabel transaksi -->
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>ID Transaksi</th>
        <th>Tanggal</th>
        <th>Kasir</th>
        <th>Obat</th>
        <th>Jumlah</th>
        <th>Harga Satuan</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?= $row['id_transaksi'] ?></td>
            <td><?= $row['tanggal'] ?></td>
            <td><?= htmlspecialchars($row['username']) ?></td>
            <td><?= htmlspecialchars($row['nama_obat']) ?></td>
            <td><?= $row['jumlah'] ?></td>
            <td>Rp <?= number_format($row['harga_satuan'], 0, ',', '.') ?></td>
            <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr>
          <td colspan="7" class="text-center text-muted">Tidak ada transaksi pada tanggal ini.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>

</body>
</html>

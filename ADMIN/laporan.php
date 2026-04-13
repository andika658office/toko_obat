<?php
session_start();
include '../config/conn.php';

// Pastikan user login
if (!isset($_SESSION['id_user'])) {
    die("Error: User belum login");
}



// Hitung total pendapatan
$sqlPendapatan = "SELECT SUM(total) AS total_pendapatan FROM detail_transaksi";
$resPendapatan = mysqli_query($db, $sqlPendapatan);
$totalPendapatan = mysqli_fetch_assoc($resPendapatan)['total_pendapatan'] ?? 0;

// Ambil tanggal dari form
$tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');

// Query transaksi
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
<title>Laporan Transaksi</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

<?php include '../asset/siderbar.php'?>

<div class="content">

<h2 class="mb-4">Laporan Transaksi</h2>

<!-- CARD STATISTIK -->
<div class="row mb-4">
    
    <div class="col-md-2">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6 class="text-muted">Total Pendapatan</h6>
                <h3 class="fw-bold text-success">
                    Rp <?php echo number_format($totalPendapatan,0,',','.'); ?>
                </h3>
            </div>
        </div>
    </div>
</div>
<!-- FILTER TANGGAL -->
<form method="get" class="mb-4">

<div class="d-flex gap-2">

<input type="date" 
name="tanggal" 
value="<?= $tanggal ?>" 
class="form-control"
style="max-width:200px;">

<button type="submit" class="btn btn-success">
<i class="fa fa-search"></i> Cek
</button>

</div>

</form>

<!-- TABEL TRANSAKSI -->

<div class="table-responsive bg-white shadow-sm rounded">

<table class="table table-hover align-middle mb-0">

<thead class="table-light">

<tr>
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


<td>
<?= $row['tanggal']; ?>
</td>

<td>
<?= htmlspecialchars($row['username']); ?>
</td>

<td>
<?= htmlspecialchars($row['nama_obat']); ?>
</td>

<td>
<?= $row['jumlah']; ?>
</td>

<td>
Rp <?= number_format($row['harga_satuan'],0,',','.'); ?>
</td>

<td class="text-success fw-bold">
Rp <?= number_format($row['total'],0,',','.'); ?>
</td>

</tr>

<?php endwhile; ?>

<?php else: ?>

<tr>
<td colspan="7" class="text-center text-muted p-4">
Tidak ada transaksi pada tanggal ini
</td>
</tr>

<?php endif; ?>

</tbody>

</table>

</div>

</div>

</body>
</html>

<style>

body{
background:#f5f7fb;
font-family:'Segoe UI', sans-serif;
}

.content{
margin-left:260px;
padding:30px;
}

.card {
    border-radius: 14px;
    max-width: 250px; /* Atur angka ini untuk menyesuaikan panjang card */
}

.table{
font-size:14px;
}

.table thead th{
font-weight:600;
}

.table-hover tbody tr:hover{
background:#f8fafc;
}

.sidebar{
    width:260px;
    height:100vh;
    background:#fff;
    position:fixed;
    border-right:1px solid #e5e7eb;
    padding:25px;
}
.logo{
    display:flex;
    align-items:center;
    gap:10px;
    margin-bottom:40px;
}
.logo-icon{
    background:#10b981;
    color:#fff;
    padding:10px;
    border-radius:10px;
}
.menu a{
    display:flex;
    align-items:center;
    gap:12px;
    padding:12px 15px;
    margin-bottom:10px;
    border-radius:12px;
    text-decoration:none;
    color:#555;
    font-weight:600;
}
.menu a.active,
.menu a:hover{
    background:#e6f9f2;
    color:#10b981;
}
</style>
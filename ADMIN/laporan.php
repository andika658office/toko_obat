<?php
include '../config/conn.php';

// Hitung total produk
$sqlProduk = "SELECT COUNT(*) AS total_produk FROM obat";
$resProduk = mysqli_query($db, $sqlProduk);
$totalProduk = mysqli_fetch_assoc($resProduk)['total_produk'];

// Hitung total pendapatan
$sqlPendapatan = "SELECT SUM(total) AS total_pendapatan FROM detail_transaksi";
$resPendapatan = mysqli_query($db, $sqlPendapatan);
$totalPendapatan = mysqli_fetch_assoc($resPendapatan)['total_pendapatan'] ?? 0;

// Hitung stok rendah
$sqlStokRendah = "SELECT COUNT(*) AS stok_rendah FROM obat WHERE stok < 50";
$resStokRendah = mysqli_query($db, $sqlStokRendah);
$stokRendah = mysqli_fetch_assoc($resStokRendah)['stok_rendah'];

// Ambil data obat
$sqlObat = "SELECT o.id_obat, o.nama_obat, k.nama_kategori, o.harga, o.stok, o.expired_date
            FROM obat o
            JOIN kategori_obat k ON o.id_kategori = k.id_kategori
            ORDER BY o.id_obat ASC
            LIMIT 20";
$resObat = mysqli_query($db, $sqlObat);

// ====== PROSES FORM TAMBAH / UPDATE ======
if (isset($_POST['simpan'])) {
    $id_obat  = $_POST['id_obat'] ?? null;
    $nama     = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga    = $_POST['harga'];
    $stok     = $_POST['stok'];
    $expired  = $_POST['expired'];

    // Cari id_kategori
    $sqlKat = "SELECT id_kategori FROM kategori_obat WHERE nama_kategori='$kategori' LIMIT 1";
    $resKat = mysqli_query($db, $sqlKat);
    $rowKat = mysqli_fetch_assoc($resKat);
    $id_kategori = $rowKat['id_kategori'] ?? 1;

    if ($id_obat) {
        // UPDATE
        $sql = "UPDATE obat SET nama_obat='$nama', id_kategori='$id_kategori',
                harga='$harga', stok='$stok', expired_date='$expired'
                WHERE id_obat='$id_obat'";
        $msg = "Data obat berhasil diupdate";
    } else {
        // INSERT
        $sql = "INSERT INTO obat (nama_obat, id_kategori, harga, stok, expired_date)
                VALUES ('$nama', '$id_kategori', '$harga', '$stok', '$expired')";
        $msg = "Data obat berhasil ditambahkan";
    }

    if (mysqli_query($db, $sql)) {
        echo "<script>alert('$msg'); window.location.href='laporan.php';</script>";
    } else {
        echo "Error: " . mysqli_error($db);
    }
}

// ====== PROSES HAPUS ======
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $sqlDel = "DELETE FROM obat WHERE id_obat='$id'";
    if (mysqli_query($db, $sqlDel)) {
        echo "<script>alert('Data obat berhasil dihapus'); window.location.href='laporan.php';</script>";
    } else {
        echo "Error: " . mysqli_error($db);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>ObatKu - Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="sidebar">
    <div class="logo">
        <div class="logo-icon"><i class="fas fa-plus"></i></div>
        <div>
            <h2>ObatKu</h2>
            <span>Panel Admin</span>
        </div>
    </div>
</div>

<div class="main">

    <div class="header">
        <div>
            <a href="homeback.php"><h2 style="margin:0">Dashboard</h2></a>
            <small style="color:#777">Ringkasan data apotek</small>
        </div>
        <div style="display:flex; gap:10px; align-items:center">
            <button><i class="fas fa-user"></i> Kasir</button>
            <button onclick="window.location.href='pengaturan.php'"><i class="fas fa-gear"></i></button>
        </div>
    </div>

    <!-- CARD -->
    <div class="cards">
        <div class="card"><h4>Total Produk</h4><h2><?php echo $totalProduk; ?></h2></div>
        <div class="card"><h4>Total Pendapatan</h4><h2>Rp <?php echo number_format($totalPendapatan, 0, ',', '.'); ?></h2></div>
        <div class="card"><h4>Stok Rendah</h4><h2 style="color:red"><?php echo $stokRendah; ?></h2></div>
    </div>

    <!-- TABEL OBAT -->
    <div class="box">
        <div class="box-header">
            <h3>Manajemen Stok Obat</h3>
            <button class="btn" onclick="openTambah()">+ Tambah Obat</button>
        </div>

        <table>
            <tr>
                <th>Nama Obat</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Expired</th>
                <th>Aksi</th>
            </tr>
            <?php if (mysqli_num_rows($resObat) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($resObat)): ?>
                    <tr>
                        <td data-id="<?php echo $row['id_obat']; ?>"><?php echo htmlspecialchars($row['nama_obat']); ?></td>
                        <td><?php echo htmlspecialchars($row['nama_kategori']); ?></td>
                        <td><?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                        <td><?php echo $row['stok']; ?></td>
                        <td><?php echo $row['expired_date']; ?></td>
                        <td class="action">
                            <i class="fas fa-pen" onclick="openEdit(this)"></i>
                            <a href="laporan.php?hapus=<?php echo $row['id_obat']; ?>" onclick="return confirm('Yakin hapus obat ini?')">
                                <i class="fas fa-trash" style="color:red"></i>
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="6">Tidak ada data obat.</td></tr>
            <?php endif; ?>
        </table>
    </div>
</div>

<!-- MODAL -->
<div class="modal" id="modalTambah">
    <div class="modal-box">
        <div class="modal-header">
            <h3 id="modalTitle">Tambah Obat</h3>
            <span class="close" onclick="closeModal()">&times;</span>
        </div>

        <form method="POST">
            <input type="hidden" name="id_obat" id="id_obat">

            <label>Nama Obat</label>
            <input type="text" name="nama" id="nama">

            <label>Kategori</label>
            <select name="kategori" id="kategori">
                <option>Analgesik</option>
                <option>Antibiotik</option>
                <option>Vitamin</option>
            </select>

            <label>Harga</label>
            <input type="number" name="harga" id="harga">

            <label>Stok</label>
            <input type="number" name="stok" id="stok">

            <label>Expired</label>
            <input type="date" name="expired" id="expired">

            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal()">Batal</button>
                <button type="submit" class="btn-save" id="btnSave" name="simpan">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
function openTambah(){
    document.getElementById("modalTitle").innerText = "Tambah Obat";
    document.getElementById("btnSave").innerText = "Tambah";

    document.getElementById("id_obat").value = "";
    document.getElementById("nama").value = "";
    document.getElementById("kategori").value = "Analgesik";
    document.getElementById("harga").value = "";
    document.getElementById("stok").value = "";
    document.getElementById("expired").value = "";

    document.getElementById("modalTambah").style.display="flex";
}

function openEdit(el){
    const row = el.closest("tr").children;

    document.getElementById("modalTitle").innerText = "Edit Obat";
    document.getElementById("btnSave").innerText = "Update";

    // Ambil id_obat dari atribut data-id di kolom pertama
    document.getElementById("id_obat").value = row[0].dataset.id;
    document.getElementById("nama").value = row[0].innerText;
    document.getElementById("kategori").value = row[1].innerText;
    document.getElementById("harga").value = row[2].innerText.replace(/\./g,''); // hapus format Rp
    document.getElementById("stok").value = row[3].innerText;
    document.getElementById("expired").value = row[4].innerText;

    document.getElementById("modalTambah").style.display="flex";
}

function closeModal(){
    document.getElementById("modalTambah").style.display="none";
}
</script>
</html>



<style>
*{
    box-sizing:border-box;
    font-family:'Segoe UI', sans-serif;
}
body{
    margin:0;
    background:#f5f7fa;
}

/* ===== SIDEBAR ===== */
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

/* ===== MAIN ===== */
.main{
    margin-left:260px;
    padding:30px;
}

/* ===== HEADER ===== */
.header{
    display:flex;
    justify-content:space-between;
    margin-bottom:30px;
}
.header button{
    padding:10px 18px;
    border-radius:10px;
    border:1px solid #ddd;
    background:#fff;
    cursor:pointer;
}

/* ===== CARDS ===== */
.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
    margin-bottom:30px;
}
.card{
    background:#fff;
    padding:20px;
    border-radius:18px;
    border:1px solid #eee;
}
.card h4{
    margin:0;
    font-size:14px;
    color:#888;
}
.card h2{
    margin-top:10px;
    font-size:26px;
}

/* ===== TABLE ===== */
.box{
    background:#fff;
    padding:25px;
    border-radius:18px;
    border:1px solid #eee;
}
.box-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}
.btn{
    background:#10b981;
    color:#fff;
    border:none;
    padding:10px 16px;
    border-radius:10px;
    cursor:pointer;
}
table{
    width:100%;
    border-collapse:collapse;
}
th,td{
    padding:14px;
    text-align:left;
    border-bottom:1px solid #eee;
}
th{
    font-size:13px;
    color:#777;
}
.action i{
    margin-right:10px;
    cursor:pointer;
}

/* ===== MODAL ===== */
.modal{
    display:none;
    position:fixed;
    inset:0;
    background:rgba(0,0,0,0.4);
    justify-content:center;
    align-items:center;
    z-index:999;
}
.modal-box{
    background:#f8fafc;
    width:460px;
    padding:25px;
    border-radius:20px;
}
.modal-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
}
.close{
    font-size:22px;
    cursor:pointer;
}
form label{
    display:block;
    font-size:13px;
    font-weight:600;
    margin-top:12px;
}
form input, form select{
    width:100%;
    padding:10px 12px;
    border-radius:10px;
    border:1px solid #ddd;
    margin-top:5px;
}
.row{
    display:flex;
    gap:10px;
}
.modal-footer{
    display:flex;
    justify-content:flex-end;
    gap:10px;
    margin-top:20px;
}
.btn-cancel{
    background:#e5e7eb;
    border:none;
    padding:10px 16px;
    border-radius:10px;
    cursor:pointer;
}
.btn-save{
    background:#10b981;
    color:#fff;
    border:none;
    padding:10px 16px;
    border-radius:10px;
    cursor:pointer;
}
</style>
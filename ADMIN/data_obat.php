<?php
session_start();
// 1. Proteksi Halaman
if (!isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}

$role = $_SESSION['role'];
include '../config/conn.php';

// ====== PROSES HAPUS (Diletakkan di atas agar list terupdate) ======
if (isset($_GET['hapus']) && $role === 'admin') {
    $id = intval($_GET['hapus']); 

    // Mulai Transaksi Database agar aman (Atomicity)
    mysqli_begin_transaction($db);
    try {
        // Hapus relasi di tabel lain agar tidak Foreign Key Error
        mysqli_query($db, "DELETE FROM detail_transaksi WHERE id_obat=$id");
        mysqli_query($db, "DELETE FROM obat_supplier WHERE id_obat=$id");
        
        // Hapus data utama
        mysqli_query($db, "DELETE FROM obat WHERE id_obat=$id");

        mysqli_commit($db);
        echo "<script>alert('Data obat berhasil dihapus'); window.location.href='data_obat.php';</script>";
    } catch (Exception $e) {
        mysqli_rollback($db);
        echo "<script>alert('Gagal menghapus data: " . $e->getMessage() . "');</script>";
    }
}

// ====== PROSES FORM TAMBAH / UPDATE ======
if (isset($_POST['simpan']) && $role === 'admin') {
    $id_obat  = $_POST['id_obat'] ?? null;
    $nama     = mysqli_real_escape_string($db, $_POST['nama']);
    $kategori = mysqli_real_escape_string($db, $_POST['kategori']);
    $harga    = intval($_POST['harga']);
    $stok     = intval($_POST['stok']);
    $expired  = $_POST['expired'];

    // Ambil ID Kategori
    $sqlKat = "SELECT id_kategori FROM kategori_obat WHERE nama_kategori='$kategori' LIMIT 1";
    $resKat = mysqli_query($db, $sqlKat);
    $rowKat = mysqli_fetch_assoc($resKat);
    $id_kategori = $rowKat['id_kategori'] ?? 1;

    if (!empty($id_obat)) {
        // UPDATE
        $sql = "UPDATE obat SET 
                nama_obat='$nama', 
                id_kategori='$id_kategori',
                harga='$harga', 
                stok='$stok', 
                expired_date='$expired'
                WHERE id_obat='$id_obat'";
        $msg = "Data obat berhasil diupdate";
    } else {
        // INSERT
        $sql = "INSERT INTO obat (nama_obat, id_kategori, harga, stok, expired_date)
                VALUES ('$nama', '$id_kategori', '$harga', '$stok', '$expired')";
        $msg = "Data obat berhasil ditambahkan";
    }

   try {
    if (mysqli_query($db, $sql)) {
        echo "<script>alert('$msg'); window.location.href='data_obat.php';</script>";
    } else {
        // kalau query gagal tapi bukan exception
        echo "<script>alert('Terjadi kesalahan query: " . mysqli_error($db) . "'); window.location.href='data_obat.php';</script>";
    }
} catch (mysqli_sql_exception $e) {
    // cek apakah error karena duplicate entry
    if ($e->getCode() == 1062) {
        echo "<script>alert('Data obat sudah pernah ada, silakan gunakan nama lain atau update data yang ada'); window.location.href='data_obat.php';</script>";
    } else {
        echo "<script>alert('Error lain: " . $e->getMessage() . "'); window.location.href='data_obat.php';</script>";
    }
}

}





// ====== AMBIL DATA UNTUK TAMPILAN ======
$stokRendah = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) AS total FROM obat WHERE stok < 50"))['total'];

$sqlObat = "SELECT o.id_obat, o.nama_obat, k.nama_kategori, o.harga, o.stok, o.expired_date
            FROM obat o
            LEFT JOIN kategori_obat k ON o.id_kategori = k.id_kategori
            ORDER BY o.id_obat DESC";
$resObat = mysqli_query($db, $sqlObat);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>ObatKu - Manajemen Stok</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css"> </head>
<body class="bg-slate-50">

<?php include '../asset/siderbar.php'; ?>

<div class="main p-6">
    <div class="header flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-slate-800">Manajemen Stok Obat</h2>
        <div class="flex gap-3">
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-user mr-2"></i> <?php echo ucfirst($role); ?>
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="card bg-white p-4 rounded-xl shadow-sm border-l-4 border-red-500">
            <h4 class="text-slate-500 text-sm">Stok Rendah (< 50)</h4>
            <h2 class="text-3xl font-bold text-red-600"><?php echo $stokRendah; ?> Item</h2>
        </div>
    </div>

    <div class="box bg-white p-6 rounded-xl shadow-sm">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Daftar Obat</h3>
            <?php if ($role === 'admin'): ?>
                <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700" onclick="openTambah()">
                    <i class="fas fa-plus mr-2"></i>Tambah Obat
                </button>
            <?php endif; ?>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-100 text-slate-600 uppercase text-sm">
                        <th class="p-3">Nama Obat</th>
                        <th class="p-3">Kategori</th>
                        <th class="p-3">Harga</th>
                        <th class="p-3">Stok</th>
                        <th class="p-3">Expired</th>
                        <?php if ($role === 'admin'): ?>
                            <th class="p-3 text-center">Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($resObat)): ?>
                    <tr class="border-b hover:bg-slate-50 transition">
                        <td class="p-3 font-semibold text-black-700" data-id="<?php echo $row['id_obat']; ?>">
                            <?php echo htmlspecialchars($row['nama_obat']); ?>
                        </td>
                        <td class="p-3"><?php echo htmlspecialchars($row['nama_kategori'] ?? 'Tanpa Kategori'); ?></td>
                        <td class="p-3 text-green-600 font-medium">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                        <td class="p-3">
                            <span class="<?php echo ($row['stok'] < 50) ? 'text-red-600 font-bold' : ''; ?>">
                                <?php echo $row['stok']; ?>
                            </span>
                        </td>
                        <td class="p-3 italic text-slate-500"><?php echo $row['expired_date']; ?></td>
                        <?php if ($role === 'admin'): ?>
                        <td class="p-3 text-center flex justify-center gap-4">
                            <button onclick="openEdit(this)" class="text-amber-500 hover:text-amber-700">
                                <i class="fas fa-pen"></i>
                            </button>
                            <a href="?hapus=<?php echo $row['id_obat']; ?>" 
                               class="text-red-500 hover:text-red-700" 
                               onclick="return confirm('Hapus obat ini? Data transaksi terkait juga akan dihapus.')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php if ($role === 'admin'): ?>
<div id="modalTambah" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
    <div class="bg-white w-full max-w-md p-6 rounded-2xl shadow-xl">
        <div class="flex justify-between items-center mb-4">
            <h3 id="modalTitle" class="text-xl font-bold">Tambah Obat</h3>
            <button onclick="closeModal()" class="text-2xl">&times;</button>
        </div>

        <form method="POST" class="space-y-4">
            <input type="hidden" name="id_obat" id="id_obat">
            
            <div>
                <label class="block text-sm font-medium text-slate-700">Nama Obat</label>
                <input type="text" name="nama" id="nama" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Kategori</label>
                <select name="kategori" id="kategori" class="w-full p-2 border rounded-lg">
                    <option>Analgesik</option>
                    <option>Antibiotik</option>
                    <option>Vitamin</option>
                    <option>Obat Luar</option>
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700">Harga (Rp)</label>
                    <input type="number" name="harga" id="harga" class="w-full p-2 border rounded-lg" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Stok</label>
                    <input type="number" name="stok" id="stok" class="w-full p-2 border rounded-lg" required>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Expired Date</label>
                <input type="date" name="expired" id="expired" class="w-full p-2 border rounded-lg" required>
            </div>

            <div class="flex justify-end gap-3 mt-6">
                <button type="button" onclick="closeModal()" class="px-4 py-2 text-slate-600 hover:bg-slate-100 rounded-lg">Batal</button>
                <button type="submit" name="simpan" id="btnSave" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?php endif; ?>

<script>
function openTambah(){
    document.getElementById("modalTitle").innerText = "Tambah Obat Baru";
    document.getElementById("btnSave").innerText = "Simpan Data";
    document.getElementById("id_obat").value = "";
    document.getElementById("nama").value = "";
    document.getElementById("harga").value = "";
    document.getElementById("stok").value = "";
    document.getElementById("expired").value = "";
    document.getElementById("modalTambah").style.display="flex";
}

function openEdit(el){
    const row = el.closest("tr").children;
    document.getElementById("modalTitle").innerText = "Edit Data Obat";
    document.getElementById("btnSave").innerText = "Update Data";

    document.getElementById("id_obat").value = row[0].dataset.id;
    document.getElementById("nama").value = row[0].innerText.trim();
    document.getElementById("kategori").value = row[1].innerText.trim();
    document.getElementById("harga").value = row[2].innerText.replace(/[^0-9]/g,'');
    document.getElementById("stok").value = row[3].innerText.trim();
    document.getElementById("expired").value = row[4].innerText.trim();

    document.getElementById("modalTambah").style.display="flex";
}

function closeModal(){
    document.getElementById("modalTambah").style.display="none";
}

// Tutup modal jika klik di luar area modal
window.onclick = function(event) {
    let modal = document.getElementById("modalTambah");
    if (event.target == modal) closeModal();
}
</script>
</body>
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

.header {
    display: flex;
    justify-content: space-between;
    align-items: center; 
    margin-bottom: 30px;
}

.header h2 {
    font-size: 26px;      
    font-weight: 800;     
    color: #1a202c;       
    margin: 0;         
    letter-spacing: -0.5px; 
}

.header-actions {
    display: flex;
    gap: 10px; 
}

.header button {
    padding: 10px 20px;
    border-radius: 10px;
    border: 1px solid #e2e8f0;
    background: #fff;
    cursor: pointer;
    font-weight: 600;
    color: #4a5568;
    transition: 0.2s;
}

.header button:hover {
    background: #f7fafc;
    border-color: #cbd5e0;
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
    width:200px;
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

/* ===== TABLE MODERN (PERBAIKAN) ===== */
.box{
    background:#fff;
    padding:0; /* Reset padding agar header th bisa full ke pinggir */
    border-radius:18px;
    border:1px solid #eee;
    overflow: hidden; /* Agar sudut tabel tetap melengkung */
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
}
.box-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:25px; /* Padding dikembalikan di sini */
}
.btn{
    background:#10b981;
    color:#fff;
    border:none;
    padding:10px 16px;
    border-radius:10px;
    cursor:pointer;
    font-weight: 600;
    margin-bottom: 20px;
}
table{
    width:100%;
    border-collapse:collapse;
}
/* Header Tabel sesuai Gambar Supplier */
th {
    background-color: #f8fafc; 
    color: #4a5568;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    padding: 15px 25px;
    border-bottom: 2px solid #edf2f7;
    text-align: left;
}
/* Baris Tabel */
td {
    padding: 18px 25px;
    color: #2d3748;
    font-size: 14px;
    border-bottom: 2px solid #e2e8f0;
}
/* Efek Hover Baris */
tr:hover {
    background-color: #f9fafb;
}

/* Class Tambahan untuk Konten */
.font-bold { font-weight: 700; color: #1a202c; }
.text-center { text-align: center; }
.text-muted { color: #718096; }

/* Badge Status untuk Stok */
.status-badge {
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    display: inline-block;
}
.status-green { background-color: #e6fffa; color: #047481; }
.status-red { background-color: #fff5f5; color: #c53030; }

/* Ikon Aksi */
.action i {
    margin-right: 15px;
    cursor: pointer;
    transition: 0.2s;
}
.edit-icon { color: #4a5568; }
.edit-icon:hover { color: #10b981; }
.delete-icon { color: #e53e3e; }
.delete-icon:hover { transform: scale(1.2); }

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
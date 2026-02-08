<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>ObatKu - Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
        <h2 style="margin:0">Dashboard</h2>
        <small style="color:#777">Ringkasan data apotek</small>
    </div>

    <div style="display:flex; gap:10px; align-items:center">
        <button>
            <i class="fas fa-user"></i> Kasir
        </button>

        <button onclick="window.location.href='pengaturan.html'">
            <i class="fas fa-gear"></i>
        </button>
    </div>
</div>


    <!-- ===== CARD TAMBAHAN (TANPA UBAH KODE LAIN) ===== -->
    <div class="cards">
        <div class="card">
            <h4>Total Produk</h4>
            <h2>13</h2>
        </div>

        <div class="card">
            <h4>Total Pendapatan</h4>
            <h2>Rp 8.500</h2>
        </div>

        <div class="card">
            <h4>Stok Rendah</h4>
            <h2 style="color:red">2</h2>
        </div>
    </div>
    <!-- ===== END CARD ===== -->

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
            <tr>
                <td>Paracetamol 500mg</td>
                <td>Obat Umum</td>
                <td>8500</td>
                <td>149</td>
                <td>2027-06-15</td>
                <td class="action">
                    <i class="fas fa-pen" onclick="openEdit(this)"></i>
                    <i class="fas fa-trash" style="color:red"></i>
                </td>
            </tr>
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

        <form>
            <label>Nama Obat</label>
            <input type="text" id="nama">

            <label>Kategori</label>
            <select id="kategori">
                <option>Obat Umum</option>
                <option>Vitamin</option>
                <option>Anak & Bayi</option>
            </select>

            <label>Harga</label>
            <input type="number" id="harga">

            <label>Stok</label>
            <input type="number" id="stok">

            <label>Expired</label>
            <input type="date" id="expired">

            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal()">Batal</button>
                <button type="submit" class="btn-save" id="btnSave">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
function openTambah(){
    document.getElementById("modalTitle").innerText = "Tambah Obat";
    document.getElementById("btnSave").innerText = "Tambah";

    document.getElementById("nama").value = "";
    document.getElementById("kategori").value = "Obat Umum";
    document.getElementById("harga").value = "";
    document.getElementById("stok").value = "";
    document.getElementById("expired").value = "";

    document.getElementById("modalTambah").style.display="flex";
}

function openEdit(el){
    const row = el.closest("tr").children;

    document.getElementById("modalTitle").innerText = "Edit Obat";
    document.getElementById("btnSave").innerText = "Update";

    document.getElementById("nama").value = row[0].innerText;
    document.getElementById("kategori").value = row[1].innerText;
    document.getElementById("harga").value = row[2].innerText;
    document.getElementById("stok").value = row[3].innerText;
    document.getElementById("expired").value = row[4].innerText;

    document.getElementById("modalTambah").style.display="flex";
}

function closeModal(){
    document.getElementById("modalTambah").style.display="none";
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
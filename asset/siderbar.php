<div class="sidebar">
    <div class="logo">
        <div class="logo-icon"><i class="fas fa-pills"></i></div>
        <div>
            <h2>ObatKu</h2>
            <span>Panel Admin</span>
        </div>
    </div>

    <!-- MENU -->
  <?php $base = "/toko_obat/ADMIN/"; ?>
<div class="menu">
    <a href="<?= $base ?>homeback.php" class="<?= basename($_SERVER['PHP_SELF'])=='homeback.php'?'active':'' ?>">
        <i class="fas fa-home"></i> Home
    </a>
    <a href="<?= $base ?>laporan.php" class="<?= basename($_SERVER['PHP_SELF'])=='laporan.php'?'active':'' ?>">
        <i class="fas fa-chart-line"></i> Dashboard
    </a>
    <a href="<?= $base ?>data_obat.php" class="<?= basename($_SERVER['PHP_SELF'])=='data_obat.php'?'active':'' ?>">
        <i class="fas fa-pills"></i> Obat
    </a>
    <a href="<?= $base ?>supplier/supplier.php" class="<?= basename($_SERVER['PHP_SELF'])=='supplier.php'?'active':'' ?>">
        <i class="fas fa-truck"></i> Supplier
    </a>
    
</div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const menuLinks = document.querySelectorAll('.sidebar .menu a');

    menuLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if (this.classList.contains('active')) {
                e.preventDefault(); // cegah reload
                const pageName = this.textContent.trim();
                alert("Kamu sudah berada di " + pageName);
            }
        });
    });
});
</script>


<style>
    .sidebar {
    width: 260px;
    height: 100vh;
    background: #fff;
    position: fixed;
    top: 0;
    left: 0;
    border-right: 1px solid #f3f4f6;
    padding: 30px 20px;
}

/* Bagian Logo Besar */
.logo {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 50px;
}

.logo-icon {
    width: 50px;
    height: 50px;
    background: #10b981;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    font-size: 24px;
}

.logo h2 {
    font-size: 24px;
    font-weight: 800;
    color: #000;
    margin: 0;
    letter-spacing: -1px;
}

.logo span {
    font-size: 14px;
    color: #111;
    font-weight: 500;
}

/* List Menu */
.menu {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.menu-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 12px 18px;
    text-decoration: none;
    color: #4b5563; /* Warna teks abu-abu gelap */
    font-weight: 500;
    font-size: 15px;
    border-radius: 12px;
    transition: all 0.2s ease;
}

/* Hover Effect */
.menu-item:hover {
    background: #f9fafb;
    color: #000;
}

/* Active State (Sama seperti di gambar Anda) */
.menu-item.active {
    background: #e6f9f2; /* Hijau muda transparan */
    color: #10b981;      /* Teks hijau */
    font-weight: 600;
}

.menu-item i {
    font-size: 18px;
    width: 20px;
    text-align: center;
}
</style>
    </style>
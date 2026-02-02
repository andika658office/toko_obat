<?php
include 'config/app.php';
$data = mysqli_query($db, "
    SELECT transaksi.*, obat.nama_obat 
    FROM transaksi 
    JOIN obat ON transaksi.id_obat = obat.id_obat
    ORDER BY transaksi.id_transaksi DESC
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
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Transaksi | Toko Obat Sehat</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <style>
        :root {
            --glass: rgba(255, 255, 255, 0.8);
            --glass-border: rgba(255, 255, 255, 0.3);
            --primary-gradient: linear-gradient(135deg, #00b09b, #96c93d);
            --accent-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --dark: #1e293b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background: radial-gradient(circle at top right, #e0f2f1, #f1f5f9);
            color: var(--dark);
            min-height: 100vh;
        }

        /* ===== NAVBAR GLASSMORPHISM ===== */
        nav {
            background: var(--glass);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding: 1rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--glass-border);
            position: sticky;
            top: 0;
            z-index: 1000;
            animation: slideDown 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .menu {
            list-style: none;
            display: flex;
            gap: 1.5rem;
        }

        .menu a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            position: relative;
            transition: 0.3s;
        }

        .menu a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0%;
            height: 2px;
            background: var(--primary-gradient);
            transition: 0.3s;
        }

        .menu a:hover::after { width: 100%; }

        /* ===== PROFILE BOX ===== */
        .profile { position: relative; }
        .profile-name {
            background: var(--dark);
            color: white;
            padding: 8px 16px;
            border-radius: 50px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }

        .profile-name:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .dropdown {
            position: absolute;
            right: 0;
            top: 50px;
            background: white;
            width: 200px;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            display: none;
            overflow: hidden;
            border: 1px solid #eee;
        }

        .profile.active .dropdown {
            display: block;
            animation: growIn 0.3s ease-out;
        }

        .dropdown a {
            display: block;
            padding: 12px 20px;
            color: var(--dark);
            text-decoration: none;
            transition: 0.2s;
        }

        .dropdown a:hover { background: #f8fafc; color: #2ecc71; padding-left: 25px; }

        /* ===== MAIN CONTENT ===== */
        .container {
            padding: 3rem 5%;
        }

        .card {
            background: var(--glass);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 2rem;
            border: 1px solid var(--glass-border);
            box-shadow: 0 20px 50px rgba(0,0,0,0.05);
            animation: fadeInUp 1s ease;
        }

        .header-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .btn-tambah {
            background: var(--primary-gradient);
            color: white;
            padding: 12px 28px;
            border-radius: 14px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: 0.4s;
            box-shadow: 0 10px 20px rgba(46, 204, 113, 0.2);
        }

        .btn-tambah:hover {
            transform: translateY(-5px) rotate(-1deg);
            box-shadow: 0 15px 30px rgba(46, 204, 113, 0.3);
        }

        /* ===== CUSTOM TABLE ===== */
        .table-responsive {
            margin-top: 1rem;
        }

        table.dataTable { border: none !important; }
        thead th {
            background: #f1f5f9 !important;
            border-bottom: none !important;
            padding: 15px !important;
            border-radius: 10px;
            color: #64748b;
            font-size: 0.85rem;
            text-transform: uppercase;
        }

        tbody td {
            padding: 20px 15px !important;
            vertical-align: middle !important;
            border-bottom: 1px solid #f1f5f9 !important;
        }

        .total-badge {
            background: #e8f5e9;
            color: #27ae60;
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: 700;
        }

        /* ===== ANIMATIONS ===== */
        @keyframes slideDown {
            from { transform: translateY(-100%); }
            to { transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes growIn {
            from { opacity: 0; transform: scale(0.95) translateY(-10px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }

        footer {
            text-align: center;
            padding: 2rem;
            color: #94a3b8;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<nav>
    <div class="logo">
        <i class="fas fa-leaf"></i> Toko Obat Sehat
    </div>

    <div class="nav-right">
        <ul class="menu">
            <?php if($role == 'admin'): ?>
                <li><a href="home.php">Home</a></li>
                <li><a href="data_obat.php">Data Obat</a></li>
            <?php endif; ?>
            <li><a href="data_transaksi.php" style="font-weight: 700; color: #2ecc71;">Transaksi</a></li>
            <li><a href="laporan.php">Laporan</a></li>
        </ul>

        <div class="profile" id="profileBox" onclick="toggleProfile()">
            <div class="profile-name">
                <i class="fas fa-user-astronaut"></i>
                <span><?= htmlspecialchars($username); ?></span>
                <i class="fas fa-chevron-down" style="font-size: 0.7rem;"></i>
            </div>
            <div class="dropdown">
                <a href="profil.php"><i class="fas fa-id-card"></i> Profil Saya</a>
                <a href="logout.php" style="color: #ff4757;"><i class="fas fa-power-off"></i> Logout</a>
            </div>
        </div>
    </div>
</nav>

<div class="container">
    <div class="card">
        <div class="header-flex">
            <div>
                <h2 style="font-size: 1.8rem; font-weight: 700;">Data Transaksi</h2>
                <p style="color: #64748b;">Kelola riwayat penjualan obat Anda</p>
            </div>
            <a href="transaksi_obat.php" class="btn-tambah">
                <i class="fas fa-cart-plus"></i> Tambah Transaksi
            </a>
        </div>

        <div class="table-responsive">
            <table id="transaksiTable" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Obat</th>
                        <th>Jumlah</th>
                        <th>Total Bayar</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; while ($row = mysqli_fetch_assoc($data)) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>
                            <div style="font-weight: 600; color: var(--dark);"><?= $row['nama_obat']; ?></div>
                        </td>
                        <td>
                            <span style="color: #64748b;"><?= $row['jumlah']; ?> Qty</span>
                        </td>
                        <td>
                            <span class="total-badge">Rp <?= number_format($row['total'], 0, ',', '.'); ?></span>
                        </td>
                        <td>
                            <div style="font-size: 0.85rem;">
                                <i class="far fa-clock"></i> <?= date('d/m/Y', strtotime($row['tanggal'])); ?>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<footer>
    &copy; 2026 <strong>Toko Obat Sehat</strong> • Dirancang dengan <i class="fas fa-heart" style="color: #ff4757;"></i> untuk Kesehatan
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        // Inisialisasi DataTable dengan animasi
        $('#transaksiTable').DataTable({
            "pageLength": 10,
            "language": {
                "search": "Cari data:",
                "paginate": {
                    "next": "<i class='fas fa-chevron-right'></i>",
                    "previous": "<i class='fas fa-chevron-left'></i>"
                }
            }
        });
    });

    function toggleProfile() {
        document.getElementById('profileBox').classList.toggle('active');
    }

    // Close dropdown on outside click
    window.onclick = function(e) {
        if (!e.target.closest('.profile')) {
            document.getElementById('profileBox').classList.remove('active');
        }
    }
</script>

</body>
</html>
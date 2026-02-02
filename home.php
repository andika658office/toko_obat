<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'config/app.php';

$username = $_SESSION['username'] ?? 'User';
$role     = $_SESSION['role'] ?? '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | SehatFarma</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #10b981;
            --primary-dark: #059669;
            --soft-green: #eefdf5;
            --dark: #1e293b;
            --text-light: #64748b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: #ffffff;
            color: var(--dark);
            overflow-x: hidden;
        }

        /* NAVBAR */
        nav {
            padding: 1.5rem 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-icon {
            background: var(--primary);
            color: white;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            font-size: 1.2rem;
        }

        .logo-text b { display: block; font-size: 1.1rem; color: var(--dark); }
        .logo-text span { font-size: 0.75rem; color: var(--text-light); }

        .menu {
            display: flex;
            list-style: none;
            gap: 2.5rem;
        }

        .menu a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            font-size: 0.95rem;
            transition: 0.3s;
        }

        .menu a:hover { color: var(--primary); }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .btn-keranjang {
            background: var(--primary);
            color: white;
            padding: 10px 20px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
        }

        /* HERO SECTION */
        .hero {
            background: radial-gradient(circle at 80% 20%, #eefdf5 0%, #ffffff 50%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 0 8%;
            padding-top: 80px;
        }

        .hero-content {
            flex: 1;
            max-width: 600px;
            animation: fadeInUp 0.8s ease;
        }

        .badge-online {
            background: white;
            padding: 8px 16px;
            border-radius: 50px;
            color: var(--primary-dark);
            font-weight: 600;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            margin-bottom: 2rem;
        }

        .hero-content h1 {
            font-size: 4.5rem;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            font-weight: 800;
        }

        .hero-content h1 span {
            color: var(--primary);
        }

        .hero-content p {
            color: var(--text-light);
            font-size: 1.1rem;
            margin-bottom: 2.5rem;
            line-height: 1.6;
        }

        .hero-btns {
            display: flex;
            gap: 15px;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            padding: 15px 30px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: 0.3s;
        }

        .btn-outline {
            background: white;
            border: 1px solid #e2e8f0;
            padding: 15px 30px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            color: var(--dark);
        }

        /* HERO IMAGE / ILLUSTRATION */
        .hero-image {
            flex: 1;
            display: flex;
            justify-content: center;
            position: relative;
        }

        .main-illus {
            width: 450px;
            height: 450px;
            background: white;
            border-radius: 40px;
            box-shadow: 0 30px 60px rgba(0,0,0,0.05);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .floating-card {
            position: absolute;
            background: white;
            padding: 15px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            animation: floating 3s ease-in-out infinite;
        }

        .card-1 { top: 10%; right: -5%; background: #10b981; color: white; padding: 20px; }
        .card-2 { bottom: 10%; left: -10%; display: flex; align-items: center; gap: 12px; }

        /* FEATURE BAR */
        .features {
            display: flex;
            gap: 40px;
            margin-top: 3rem;
        }

        .feat-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
            color: var(--text-light);
            font-weight: 600;
        }

        .feat-item i {
            color: var(--primary);
            font-size: 1.2rem;
        }

        /* DROPDOWN PROFILE */
        .profile { position: relative; cursor: pointer; }
        .dropdown {
            position: absolute;
            top: 50px;
            right: 0;
            background: white;
            min-width: 150px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            display: none;
            overflow: hidden;
        }
        .profile.active .dropdown { display: block; }
        .dropdown a {
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            color: var(--dark);
            font-size: 0.9rem;
        }
        .dropdown a:hover { background: var(--soft-green); color: var(--primary); }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        footer {
            text-align: center;
            padding: 2rem;
            color: var(--text-light);
            font-size: 0.85rem;
            border-top: 1px solid #f1f5f9;
        }
    </style>
</head>
<body>

<nav>
    <div class="logo-container">
        <div class="logo-icon"><i class="fas fa-plus"></i></div>
        <div class="logo-text">
            <b>SehatFarma</b>
            <span>Apotek Terpercaya</span>
        </div>
    </div>

    <ul class="menu">
        <li><a href="home.php">Beranda</a></li>
        <li><a href="data_obat.php">Produk</a></li>
        <li><a href="laporan.php">Tentang Kami</a></li>
        <li><a href="#">Kontak</a></li>
    </ul>

    <div class="nav-right">
        <div class="profile" id="profileBox" onclick="toggleProfile()">
            <span style="font-weight: 600;">👤 <?= htmlspecialchars($username); ?></span>
            <div class="dropdown">
                <a href="profil.php">Profil Saya</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
        <a href="data_transaksi.php" class="btn-keranjang">
            <i class="fas fa-shopping-cart"></i> Keranjang
        </a>
    </div>
</nav>

<section class="hero">
    <div class="hero-content">
        <div class="badge-online">
            <i class="fas fa-circle" style="font-size: 8px;"></i> Apotek Online Terpercaya
        </div>
        <h1>Kesehatan Anda,<br><span>Prioritas Kami</span></h1>
        <p>Dapatkan obat-obatan berkualitas dengan harga terjangkau. Pesan mudah, pengiriman cepat ke seluruh Indonesia.</p>
        
        <div class="hero-btns">
            <a href="data_obat.php" class="btn-primary">Belanja Sekarang <i class="fas fa-arrow-right"></i></a>
            <a href="#" class="btn-outline">Konsultasi Gratis</a>
        </div>

        <div class="features">
            <div class="feat-item"><i class="fas fa-check-circle"></i> Produk Asli 100%</div>
            <div class="feat-item"><i class="fas fa-truck"></i> Gratis Ongkir</div>
            <div class="feat-item"><i class="fas fa-clock"></i> Layanan 24 Jam</div>
        </div>
    </div>

    <div class="hero-image">
        <div class="main-illus">
            <i class="fas fa-staff-snake" style="font-size: 8rem; color: #e2e8f0;"></i>
            
            <div class="floating-card card-1">
                <i class="fas fa-pills" style="font-size: 2rem;"></i>
            </div>
            
            <div class="floating-card card-2">
                <div style="background: #10b981; color: white; width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-shield-halved"></i>
                </div>
                <div>
                    <div style="font-weight: 800; font-size: 1.1rem;">10.000+</div>
                    <div style="font-size: 0.7rem; color: #64748b;">Produk Tersedia</div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
    © 2026 Toko Obat Sehat | Aplikasi Sederhana
</footer>

<script>
function toggleProfile() {
    document.getElementById('profileBox').classList.toggle('active');
}
window.onclick = function(e) {
    if (!document.getElementById('profileBox').contains(e.target)) {
        document.getElementById('profileBox').classList.remove('active');
    }
}
</script>

</body>
</html>
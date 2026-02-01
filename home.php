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
    <title>Home | Toko Obat</title>
</head>

<body>

<!-- NAVBAR -->
<nav>
    <div class="logo">Toko Obat Sehat</div>

    <div class="nav-right">
        <ul class="menu">
                <li><a href="home.php">Home</a></li>
                <li><a href="data_obat.php">Data Obat</a></li>
          
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


<!-- FOOTER -->
<footer>
    © 2026 Toko Obat Sehat | Aplikasi Sederhana
</footer>

<script>
function toggleProfile() {
    document.getElementById('profileBox').classList.toggle('active');
}

window.onclick = function(e) {
    const profile = document.getElementById('profileBox');
    if (!profile.contains(e.target)) {
        profile.classList.remove('active');
    }
}
</script>

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
    margin-top: 830px;
}
</style>

<?php
include '../config/conn.php'; // koneksi pakai $db
session_start();

if (isset($_POST['login'])) {
    $u = mysqli_real_escape_string($db, $_POST['username']);
    $p = $_POST['password'];

    // Cari user berdasarkan username
    $sql = "SELECT * FROM user WHERE username='$u' LIMIT 1";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($p, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            // Arahkan sesuai role
            if ($row['role'] === 'admin') {
                header('Location: ../admin/homeback.php');
            } else {
                header('Location: ../user/home.php');
            }
            exit();
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ApotekSehat - Full Screen Split</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

   
</head>
<body>

<div class="container">
    <div class="left">
        <div class="left-content">
            <div class="brand">
                <div class="logo">
                    <i class="fas fa-prescription-bottle-medical"></i>
                </div>
                <div>
                    <h3>ObatKu</h3>
                    <span>Partner Kesehatan Terpercaya</span>
                </div>
            </div>

            <h1>Selamat Datang! 👋</h1>
            <p class="subtitle">Masuk ke akun Anda untuk mulai memesan obat.</p>

            <form action="" method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <div class="input-box">
                        <i class="far fa-user"></i>
                        <input name="username" type="text" placeholder="Username Anda" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="pass-header">
                        <label>Password</label>
                        <a href="#" class="forgot-link">Lupa Password?</a>
                    </div>
                    <div class="input-box">
                        <i class="fas fa-lock"></i>
                        <input name="password" type="password" placeholder="••••••••" required>
                    </div>
                </div>

                <button type="submit" class="btn-login" name="login">Masuk Ke Akun</button>
            </form>

            <div class="register-text">
                Belum punya akun? <a href="register.php">Daftar Gratis Sekarang</a>
            </div>
        </div>
    </div>

    <div class="right">
        <i class="fas fa-heart f-icon ic-1"></i>
        <i class="fas fa-shield-halved f-icon ic-2"></i>

        <div class="center-logo">
            <i class="fas fa-pills"></i>
        </div>

        <h2>Kesehatan Anda,<br>Prioritas Utama Kami</h2>
        <p>
            Dapatkan akses ke ribuan jenis obat berkualitas dengan harga terbaik. 
            Layanan pengantaran cepat 24/7 langsung ke pintu Anda.
        </p>

        <div class="stats">
            <div class="stat-item">
                <h3>1500+</h3>
                <span>Produk Obat</span>
            </div>
            <div class="stat-item">
                <h3>60K+</h3>
                <span>Pelanggan</span>
            </div>
            <div class="stat-item">
                <h3>24/7</h3>
                <span>Layanan</span>
            </div>
        </div>
    </div>
</div>

</body>
 <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body, html {
            height: 100%;
            width: 100%;
            overflow: hidden; /* Mencegah scroll pada desktop */
        }

        .container {
            display: flex;
            height: 100vh;
            width: 100vw;
        }

        /* ===== LEFT SIDE (FORM) ===== */
        .left {
            width: 50%;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 10%; /* Memberi ruang agar form tidak terlalu lebar */
        }

        .left-content {
            width: 100%;
            max-width: 450px; /* Membatasi lebar form agar tetap estetik */
        }

        .brand {
            display: flex;
            gap: 15px;
            align-items: center;
            margin-bottom: 50px;
        }

        .logo {
            width: 50px;
            height: 50px;
            background: #10b981;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 22px;
        }

        .brand h3 {
            font-size: 20px;
            font-weight: 700;
            color: #111827;
        }

        .brand span {
            font-size: 14px;
            color: #6b7280;
            display: block;
        }

        .left h1 {
            font-size: 36px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 10px;
        }

        .left p.subtitle {
            color: #6b7280;
            margin-bottom: 40px;
            font-size: 16px;
        }

        /* Form Styling */
        .form-group {
            margin-bottom: 25px;
        }

        label {
            font-size: 14px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 8px;
            display: block;
        }

        .input-box {
            position: relative;
        }

        .input-box input {
            width: 100%;
            padding: 16px 16px 16px 52px;
            border-radius: 12px;
            border: 1.5px solid #e5e7eb;
            font-size: 15px;
            background: #f9fafb;
            transition: 0.3s;
        }

        .input-box i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 20px;
        }

        .input-box input:focus {
            outline: none;
            border-color: #10b981;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        .pass-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .forgot-link {
            font-size: 13px;
            color: #10b981;
            text-decoration: none;
            font-weight: 600;
        }

        .btn-login {
            width: 100%;
            padding: 16px;
            border: none;
            border-radius: 12px;
            background: #10b981;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-login:hover {
            background: #059669;
            transform: translateY(-2px);
        }

        .register-text {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #6b7280;
        }

        .register-text a {
            color: #10b981;
            font-weight: 600;
            text-decoration: none;
        }

        /* ===== RIGHT SIDE (GREEN) ===== */
        .right {
            width: 50%;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 60px;
            position: relative;
        }

        .center-logo {
            width: 120px;
            height: 120px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
            margin-bottom: 40px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .right h2 {
            font-size: 42px;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 25px;
        }

        .right p {
            font-size: 18px;
            opacity: 0.9;
            max-width: 450px;
            line-height: 1.8;
            margin-bottom: 60px;
        }

        .stats {
            display: flex;
            gap: 50px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 40px;
        }

        .stat-item h3 { font-size: 28px; font-weight: 700; }
        .stat-item span { font-size: 14px; opacity: 0.8; }

        /* Floating Icons */
        .f-icon {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 50%;
            font-size: 24px;
        }
        .ic-1 { top: 10%; right: 15%; }
        .ic-2 { bottom: 10%; left: 15%; }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .left h1 { font-size: 28px; }
            .right h2 { font-size: 32px; }
        }

        @media (max-width: 768px) {
            .container { flex-direction: column; overflow-y: auto; }
            .left, .right { width: 100%; height: auto; padding: 60px 20px; }
            .right { order: -1; } /* Info kesehatan muncul di atas pada HP */
        }
    </style>
</html>



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ApotekSehat</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f3f4f6; /* Warna abu-abu terang sesuai gambar */
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .wrapper {
            width: 100%;
            max-width: 1100px;
            height: 650px;
            background: #fff;
            border-radius: 24px; /* Border radius lebih lembut */
            overflow: hidden;
            display: flex;
            box-shadow: 0 40px 100px rgba(0,0,0,0.08); /* Shadow lebih halus */
        }

        /* ===== LEFT SIDE ===== */
        .left {
            width: 50%;
            padding: 60px 80px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .brand {
            display: flex;
            gap: 15px;
            align-items: center;
            margin-bottom: 50px;
        }

        .logo {
            width: 48px;
            height: 48px;
            background: #10b981;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 20px;
        }

        .brand h3 {
            font-size: 18px;
            font-weight: 700;
            color: #111827;
        }

        .brand span {
            font-size: 13px;
            color: #6b7280;
            display: block;
        }

        .left h1 {
            font-size: 32px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 10px;
        }

        .left p {
            color: #6b7280;
            margin-bottom: 40px;
            font-size: 15px;
        }

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
            padding: 15px 15px 15px 50px;
            border-radius: 14px;
            border: 1.5px solid #e5e7eb;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #f9fafb;
        }

        .input-box i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 18px;
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
            font-weight: 500;
        }

        .btn-login {
            width: 100%;
            padding: 16px;
            border: none;
            border-radius: 14px;
            background: #10b981; /* Solid green sesuai tombol di gambar */
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

        /* ===== RIGHT SIDE ===== */
        .right {
            width: 50%;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: #fff;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
        }

        /* Ikon-ikon kecil melayang seperti di gambar */
        .right-icon {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 15px;
            border-radius: 12px;
            font-size: 20px;
        }
        .icon-top-left { top: 10%; left: 15%; border-radius: 50%; padding: 10px; }
        .icon-top-right { top: 20%; right: 10%; }
        .icon-bottom-right { bottom: 15%; right: 15%; border-radius: 50%; padding: 10px; }

        .center-logo {
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            margin-bottom: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .right h2 {
            font-size: 32px;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 20px;
        }

        .right p {
            font-size: 15px;
            opacity: 0.9;
            line-height: 1.7;
            max-width: 400px;
            margin-bottom: 50px;
        }

        .stats-container {
            display: flex;
            gap: 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 30px;
        }

        .stat-item h3 {
            font-size: 24px;
            font-weight: 700;
        }

        .stat-item span {
            font-size: 13px;
            opacity: 0.8;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .wrapper {
                flex-direction: column;
                height: auto;
                max-width: 500px;
            }
            .left, .right {
                width: 100%;
                padding: 40px;
            }
            .right { display: none; } /* Sembunyikan sisi kanan di mobile sesuai standar UI */
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="left">
        <div class="brand">
            <div class="logo">
                <i class="fas fa-link"></i>
            </div>
            <div>
                <h3>ApotekSehat</h3>
                <span>Toko Obat Terpercaya</span>
            </div>
        </div>

        <h1>Selamat Datang! 👋</h1>
        <p>Masuk ke akun Anda untuk melanjutkan</p>

        <form action="" method="POST">
    <div class="form-group">
        <label>Username</label>
        <div class="input-box">
            <i class="far fa-user"></i>
            <input type="text" name="username" placeholder="Masukkan username" required>
        </div>
    </div>

    <div class="form-group">
        <div class="pass-header">
            <label>Password</label>
            <a href="#" class="forgot-link">Lupa password?</a>
        </div>
        <div class="input-box">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Masukkan password" required>
        </div>
    </div>

    <button type="submit" name="login" class="btn-login">Masuk</button>
</form>

        <div class="register-text">
            Belum punya akun? <a href="register.php">Daftar Sekarang</a>
        </div>
    </div>

    <div class="right">
        <div class="right-icon icon-top-left"><i class="far fa-heart"></i></div>
        <div class="right-icon icon-top-right"><i class="fas fa-link"></i></div>
        <div class="right-icon icon-bottom-right"><i class="fas fa-shield-alt"></i></div>

        <div class="center-logo">
            <i class="fas fa-pills"></i>
        </div>

        <h2>Kesehatan Anda,<br>Prioritas Kami</h2>
        <p>
            Temukan berbagai obat berkualitas dengan harga terjangkau. 
            Layanan 24 jam untuk kesehatan keluarga Anda.
        </p>

        <div class="stats-container">
            <div class="stat-item">
                <h3>1000+</h3>
                <span>Produk Obat</span>
            </div>
            <div class="stat-item">
                <h3>50K+</h3>
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
</html>
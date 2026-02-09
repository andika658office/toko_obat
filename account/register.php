<?php
// account/register.php
include '../config/conn.php';
session_start();

if (isset($_POST['register'])) {
    // Ambil data dari form
    $u  = mysqli_real_escape_string($db, $_POST['username']);
    $p  = $_POST['password'];
    $cp = $_POST['confirm_password'];

    // Validasi konfirmasi password
    if ($p !== $cp) {
        echo "Password dan konfirmasi tidak sama!";
        exit();
    }

    // Cek apakah username sudah ada
    $check = "SELECT * FROM user WHERE username = '$u'";
    $result = mysqli_query($db, $check);

    if (mysqli_num_rows($result) > 0) {
        echo "Username sudah digunakan, silakan pilih yang lain!";
        exit();
    }

    // Hash password
    $hashed = password_hash($p, PASSWORD_DEFAULT);

    // Insert ke database dengan role default 'user'
    $sql = "INSERT INTO user (username, password, role) 
            VALUES ('$u', '$hashed', 'user')";
    if (mysqli_query($db, $sql)) {
        // Set session untuk user
        $_SESSION['user'] = true;
        $_SESSION['username'] = $u;

        header('Location: ../admin/homeback.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($db);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - ApotekSehat Full Screen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        /* Memastikan container membagi layar 50:50 secara penuh */
        .split-container {
            display: flex;
            height: 100vh;
            width: 100vw;
            overflow: hidden;
        }
    </style>
</head>

<body class="bg-white">

    <div class="split-container">
        
        <div class="w-full md:w-1/2 flex items-center justify-center p-8 md:p-16 bg-white">
            <div class="max-w-md w-full">
                <div class="flex items-center gap-2 mb-8 md:hidden">
                    <div class="bg-emerald-500 p-2 rounded-lg text-white">💊</div>
                    <h1 class="font-bold text-slate-800">ApotekSehat</h1>
                </div>

                <h2 class="text-3xl font-bold text-slate-800 mb-2">Buat Akun Baru</h2>
                <p class="text-slate-500 mb-8">Silakan lengkapi data Anda untuk bergabung.</p>

                <form class="space-y-5" method="POST" action="">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2 tracking-wider">Nama Lengkap</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                                <i class="far fa-user"></i>
                            </span>
                            <input name="username" type="text" placeholder="Masukkan nama lengkap"
                                class="w-full pl-11 pr-4 py-3.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:outline-none transition bg-slate-50">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2 tracking-wider">Password</label>
                            <input name="password" type="password" placeholder="••••••••"
                                class="w-full px-4 py-3.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:outline-none transition bg-slate-50">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2 tracking-wider">Konfirmasi</label>
                            <input name="confirm_password" type="password" placeholder="••••••••"
                                class="w-full px-4 py-3.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:outline-none transition bg-slate-50">
                        </div>
                    </div>

                    <button class="w-full bg-emerald-500 text-white py-4 rounded-xl font-bold hover:bg-emerald-600 transition shadow-lg shadow-emerald-200 mt-4 active:scale-[0.98]" type="submit" name="register">
                        Daftar Sekarang
                    </button>
                </form>

                <p class="text-center text-slate-600 mt-8 text-sm">
                    Sudah punya akun? 
                    <a href="login.php" class="text-emerald-500 font-bold hover:underline">Masuk di sini</a>
                </p>
            </div>
        </div>

        <div class="hidden md:flex md:w-1/2 bg-gradient-to-bl from-emerald-400 to-emerald-600 p-20 flex-col justify-center text-white relative">
            <div class="absolute top-10 right-10 opacity-20 text-6xl rotate-12"><i class="fas fa-pills"></i></div>
            <div class="absolute bottom-20 left-10 opacity-20 text-6xl -rotate-12"><i class="fas fa-heartbeat"></i></div>

            <div class="relative z-10">
                <div class="flex items-center gap-3 mb-16">
                    <div class="bg-white/20 p-3 rounded-2xl backdrop-blur-md border border-white/30 text-2xl">💊</div>
                    <h1 class="text-2xl font-bold tracking-tight">ObatKu</h1>
                </div>

                <h2 class="text-5xl font-bold leading-[1.2] mb-8">Mulailah Hidup Sehat Bersama Kami</h2>
                <p class="text-emerald-50 text-lg mb-12 max-w-md opacity-90">
                    Dapatkan kemudahan akses kesehatan, konsultasi apoteker, dan promo menarik setiap harinya.
                </p>

                <ul class="space-y-6">
                    <li class="flex items-start gap-4">
                        <span class="bg-white text-emerald-600 rounded-full h-7 w-7 flex items-center justify-center text-xs shrink-0 shadow-lg">
                            <i class="fas fa-check"></i>
                        </span>
                        <div>
                            <p class="font-bold text-lg">Akses Produk Lengkap</p>
                            <p class="text-emerald-100 text-sm">Ribuan obat dan vitamin tersedia untuk Anda.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <span class="bg-white text-emerald-600 rounded-full h-7 w-7 flex items-center justify-center text-xs shrink-0 shadow-lg">
                            <i class="fas fa-check"></i>
                        </span>
                        <div>
                            <p class="font-bold text-lg">Diskon Member Eksklusif</p>
                            <p class="text-emerald-100 text-sm">Hemat lebih banyak dengan poin dan promo member.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <span class="bg-white text-emerald-600 rounded-full h-7 w-7 flex items-center justify-center text-xs shrink-0 shadow-lg">
                            <i class="fas fa-check"></i>
                        </span>
                        <div>
                            <p class="font-bold text-lg">Konsultasi Gratis</p>
                            <p class="text-emerald-100 text-sm">Tanya apoteker kami langsung dari aplikasi.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </div>

</body>
</html>
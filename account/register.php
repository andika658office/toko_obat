<?php
// account/register.php
include_once 'connection.php';
if (isset($_SESSION['register'])) {
    $u = $_SESSION['user_id'];
    $p = $_SESSION['password'];
    $sql = "SELECT * FROM users WHERE user_id='$u' AND password='$p'";
    if (mysqli_num_rows(mysqli_query($conn, $sql)) > 1) {
        $_SESSION['admin'] = true;
        header('Location: ../index.php');
    } else {
        $_error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - ApotekSehat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap"
        rel="stylesheet">
</head>

<body class="bg-slate-100 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white rounded-[2rem] shadow-2xl flex overflow-hidden max-w-5xl w-full">

        <div class="w-full md:w-3/5 p-12">
            <h2 class="text-3xl font-bold text-slate-800 mb-1">Buat Akun Baru</h2>
            <p class="text-slate-500 mb-8 text-sm">Isi data di bawah untuk mendaftar</p>

            <form class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Nama Lengkap</label>
                    <input type="text" placeholder="Masukkan nama lengkap"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 focus:outline-none transition">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Email</label>
                    <input type="email" placeholder="nama@email.com"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 focus:outline-none transition">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Nomor Telepon</label>
                    <input type="tel" placeholder="08xxxxxxxxxx"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 focus:outline-none transition">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Password</label>
                        <input type="password" placeholder="Min. 6 karakter"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 focus:outline-none transition">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Konfirmasi</label>
                        <input type="password" placeholder="Ulangi password"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 focus:outline-none transition">
                    </div>
                </div>
                <button
                    class="w-full bg-emerald-500 text-white py-4 rounded-xl font-bold hover:bg-emerald-600 transition shadow-lg shadow-emerald-200 mt-4">Daftar
                    Sekarang</button>
            </form>
            <p class="text-center text-slate-600 mt-6 text-sm">Sudah punya akun? <a href="#"
                    class="text-emerald-500 font-bold hover:underline">Masuk</a></p>
        </div>

        <div
            class="hidden md:flex w-2/5 bg-gradient-to-bl from-emerald-400 to-emerald-600 p-12 flex-col justify-center text-white">
            <div class="mb-12">
                <div class="flex items-center gap-2 mb-12">
                    <div class="bg-white/20 p-2 rounded-lg text-white">💊</div>
                    <h1 class="font-bold text-white">ApotekSehat</h1>
                </div>
                <h2 class="text-4xl font-bold leading-tight mb-6">Bergabunglah dengan Keluarga ApotekSehat</h2>
                <p class="text-emerald-50 mb-8">Daftar sekarang dan nikmati berbagai keuntungan eksklusif untuk menjaga
                    kesehatan Anda.</p>
                <ul class="space-y-4 text-sm font-medium">
                    <li class="flex items-center gap-3">
                        <span class="bg-white/20 rounded-full p-1 text-[10px]">✔</span> Akses ke ribuan produk obat
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="bg-white/20 rounded-full p-1 text-[10px]">✔</span> Promo & diskon eksklusif member
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="bg-white/20 rounded-full p-1 text-[10px]">✔</span> Konsultasi gratis dengan
                        apoteker
                    </li>
                </ul>
            </div>
        </div>

    </div>
</body>

</html>
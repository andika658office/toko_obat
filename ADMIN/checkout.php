<?php
session_start();
include '../config/conn.php';

// Pastikan user sudah login
if (!isset($_SESSION['id_user'])) {
    die("error: User belum login");
}
$id_user = $_SESSION['id_user'];

// Ambil data keranjang dari AJAX
$cart = json_decode($_POST['cart'], true);

// Cek keranjang kosong
if (empty($cart)) {
    die("error: cart kosong");
}

mysqli_begin_transaction($db);

try {
    // Insert transaksi
    $sqlTrans = "INSERT INTO transaksi (tanggal, id_user) VALUES (NOW(), '$id_user')";
    mysqli_query($db, $sqlTrans);
    $id_transaksi = mysqli_insert_id($db);

    foreach ($cart as $item) {
        $id_obat = $item['id'];
        $jumlah  = $item['jumlah'];
        $harga   = $item['harga'];
        $total   = $jumlah * $harga;

        // Validasi id_obat
        $cekObat = mysqli_query($db, "SELECT id_obat FROM obat WHERE id_obat='$id_obat'");
        if (mysqli_num_rows($cekObat) == 0) {
            throw new Exception("Obat dengan ID $id_obat tidak ditemukan");
        }

        // Insert detail transaksi
        $sqlDetail = "INSERT INTO detail_transaksi (id_transaksi, id_obat, jumlah, harga_satuan, total)
                      VALUES ('$id_transaksi', '$id_obat', '$jumlah', '$harga', '$total')";
        mysqli_query($db, $sqlDetail);

        // Update stok obat
        $sqlUpdate = "UPDATE obat 
                      SET stok = stok - $jumlah 
                      WHERE id_obat = '$id_obat' AND stok >= $jumlah";
        mysqli_query($db, $sqlUpdate);

        if (mysqli_affected_rows($db) == 0) {
            throw new Exception("Stok tidak cukup untuk obat ID $id_obat");
        }
    }

    mysqli_commit($db);
    echo "success";

} catch (Exception $e) {
    mysqli_rollback($db);
    echo "error: " . $e->getMessage();
}
?>
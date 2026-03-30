<?php
include 'config/app.php';

$id = intval($_GET['id']); // validasi input angka

// Hapus relasi dulu agar tidak kena foreign key error
mysqli_query($db, "DELETE FROM detail_transaksi WHERE id_obat=$id");
mysqli_query($db, "DELETE FROM obat_supplier WHERE id_obat=$id");

// Hapus obat
if (mysqli_query($db, "DELETE FROM obat WHERE id_obat=$id")) {
    echo "<script>alert('Data obat berhasil dihapus'); window.location.href='data_obat.php';</script>";
    exit();
} else {
    echo "<script>alert('Error: " . mysqli_error($db) . "'); window.location.href='data_obat.php';</script>";
}
?>

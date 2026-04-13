<?php
session_start();
include '../../config/conn.php';

$nama   = mysqli_real_escape_string($db, $_POST['nama_supplier']);
$alamat = mysqli_real_escape_string($db, $_POST['alamat']);
$telp   = mysqli_real_escape_string($db, $_POST['no_telepon']);
$bpom   = mysqli_real_escape_string($db, $_POST['BPOM']);
$status = mysqli_real_escape_string($db, $_POST['status']);

$cek = "SELECT * FROM supplier WHERE nama_supplier='$nama'";
$res = mysqli_query($db, $cek);

if (mysqli_num_rows($res) > 0) {
    echo "<script>alert('Supplier sudah pernah ada'); window.location.href='supplier.php';</script>";
    exit; // pastikan ini ada agar tidak lanjut ke INSERT
}

$sql = "INSERT INTO supplier (nama_supplier, alamat, no_telepon, BPOM, status) 
        VALUES ('$nama', '$alamat', '$telp', '$bpom', '$status')";
if (mysqli_query($db, $sql)) {
    echo "<script>alert('Supplier berhasil ditambahkan'); window.location.href='supplier.php';</script>";
} else {
    echo "<script>alert('Terjadi kesalahan: " . mysqli_error($db) . "'); window.location.href='supplier.php';</script>";
}

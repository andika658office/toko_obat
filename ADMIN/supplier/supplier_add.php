<?php
include '../../config/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama   = mysqli_real_escape_string($db, $_POST['nama_supplier']);
    $alamat = mysqli_real_escape_string($db, $_POST['alamat']);
    $telp   = mysqli_real_escape_string($db, $_POST['no_telepon']);
    $bpom   = mysqli_real_escape_string($db, $_POST['BPOM']);
    $status = mysqli_real_escape_string($db, $_POST['status']);

    $sql = "INSERT INTO supplier (nama_supplier, alamat, no_telepon, BPOM, status) 
            VALUES ('$nama', '$alamat', '$telp', '$bpom', '$status')";
    mysqli_query($db, $sql);
}
header("Location: supplier.php"); // kembali ke halaman utama
exit;

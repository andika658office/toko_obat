<?php
include '../../config/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id     = (int) $_POST['id_supplier'];
    $nama   = mysqli_real_escape_string($db, $_POST['nama_supplier']);
    $alamat = mysqli_real_escape_string($db, $_POST['alamat']);
    $telp   = mysqli_real_escape_string($db, $_POST['no_telepon']);
    $bpom   = mysqli_real_escape_string($db, $_POST['BPOM']);
    $status = mysqli_real_escape_string($db, $_POST['status']);

    $sql = "UPDATE supplier 
            SET nama_supplier='$nama', alamat='$alamat', no_telepon='$telp', BPOM='$bpom', status='$status' 
            WHERE id_supplier=$id";
    mysqli_query($db, $sql);
}
header("Location: supplier.php");
exit;

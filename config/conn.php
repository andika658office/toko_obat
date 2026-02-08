<?php
$db = mysqli_connect('localhost', 'root', '', 'toko_obat_test');

if (!$db) {
    echo "gagal koneksi ke database";
}else {
     //echo "berhasil koneksi ke database";
}
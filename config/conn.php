<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//untuk menampilkan error namun versi linux
?> 

<?php
$db = mysqli_connect('localhost', 'root', '', 'toko_obat_test');

if (!$db) {
    echo "gagal koneksi ke database";
}else {
     //echo "berhasil koneksi ke database";
}
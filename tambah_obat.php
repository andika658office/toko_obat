<?php
include 'config/app.php';

if (isset($_POST['simpan'])) {
    mysqli_query($db, "INSERT INTO obat VALUES(
        NULL,
        '$_POST[nama]',
        '$_POST[jenis]',
        '$_POST[stok]',
        '$_POST[harga]',
        '$_POST[exp]'
    )");

    header("Location: data_obat.php");
}
?>

<h2>Tambah Obat</h2>
<form method="post">
    Nama Obat <br>
    <input type="text" name="nama"><br><br>

    Jenis <br>
    <input type="text" name="jenis"><br><br>

    Stok <br>
    <input type="number" name="stok"><br><br>

    Harga <br>
    <input type="number" name="harga"><br><br>

    Expired <br>
    <input type="date" name="exp"><br><br>

    <button name="simpan">Simpan</button>
</form>

<?php
include 'config/app.php';

$id = $_GET['id'];
$data = mysqli_query($db, "SELECT * FROM obat WHERE id_obat=$id");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    mysqli_query($db, "UPDATE obat SET
        nama_obat='$_POST[nama]',
        jenis='$_POST[jenis]',
        stok='$_POST[stok]',
        harga='$_POST[harga]',
        exp='$_POST[exp]'
        WHERE id_obat=$id
    ");

    header("Location: data_obat.php");
}
?>

<h2>Edit Obat</h2>
<form method="post">
    Nama Obat <br>
    <input type="text" name="nama" value="<?= $row['nama_obat'] ?>"><br><br>

    Jenis <br>
    <input type="text" name="jenis" value="<?= $row['jenis'] ?>"><br><br>

    Stok <br>
    <input type="number" name="stok" value="<?= $row['stok'] ?>"><br><br>

    Harga <br>
    <input type="number" name="harga" value="<?= $row['harga'] ?>"><br><br>

    Expired <br>
    <input type="date" name="exp" value="<?= $row['exp'] ?>"><br><br>

    <button name="update">Update</button>
</form>

<?php
include 'config/app.php';

// ambil data obat
$obat = mysqli_query($db, "SELECT * FROM obat");

// proses simpan transaksi
if (isset($_POST['simpan'])) {

    $id_obat = $_POST['id_obat'];
    $jumlah  = $_POST['jumlah'];

    // ambil data obat berdasarkan id
    $q = mysqli_query($db, "SELECT * FROM obat WHERE id_obat='$id_obat'");
    $data = mysqli_fetch_assoc($q);

    // validasi stok
    if ($jumlah > $data['stok']) {
        echo "
        <script>
            alert('Stok tidak cukup!');
            window.location='transaksi_obat.php';
        </script>";
        exit;
    }

    // hitung total
    $total = $jumlah * $data['harga'];

    // simpan transaksi
    $insert = mysqli_query($db, "INSERT INTO transaksi 
        (id_obat, jumlah, total, tanggal)
        VALUES 
        ('$id_obat', '$jumlah', '$total', NOW())");

    if ($insert) {
        // kurangi stok
        mysqli_query($db, "UPDATE obat 
            SET stok = stok - $jumlah 
            WHERE id_obat='$id_obat'");

        echo "
        <script>
            alert('Transaksi berhasil!');
            window.location='data_transaksi.php';
        </script>";
        exit;
    } else {
        echo "
        <script>
            alert('Transaksi gagal!');
            window.location='transaksi_obat.php';
        </script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transaksi Obat</title>
</head>
<body>

<h2>Form Transaksi Obat</h2>

<form method="POST">
    <label>Nama Obat</label><br>
    <select name="id_obat" required>
        <option value="">-- Pilih Obat --</option>
        <?php while ($row = mysqli_fetch_assoc($obat)) { ?>
            <option value="<?= $row['id_obat']; ?>">
                <?= $row['nama_obat']; ?> (Stok: <?= $row['stok']; ?>)
            </option>
        <?php } ?>
    </select>
    <br><br>

    <label>Jumlah</label><br>
    <input type="number" name="jumlah" min="1" required>
    <br><br>

    <button type="submit" name="simpan">Simpan Transaksi</button>
</form>

</body>
</html>

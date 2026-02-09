<?php
include '../config/conn.php';

if (isset($_POST['keyword'])) {
    $keyword = mysqli_real_escape_string($db, $_POST['keyword']);
    
    // Ambil minimal 5 obat yang diawali dengan keyword
    $query = "SELECT * FROM obat WHERE nama_obat LIKE '$keyword%' LIMIT 5";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    $nama = htmlspecialchars($row['nama_obat']);
    $harga = number_format($row['harga'], 0, ',', '.');
    
    echo "
    <div class='result-item' onclick=\"pilihObat('$nama')\">
        <span class='name'>$nama</span>
        <span class='price-tag'>Rp $harga</span>
    </div>";
}
    } else {
        echo "<div style='padding:15px; text-align:center; color:#999;'>Obat tidak ditemukan...</div>";
    }
}
?>
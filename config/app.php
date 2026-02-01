<?php
include 'connection.php';

function query($q)
{ 
    global $db;
    return mysqli_query($db, $q);
}

/**
 * Total Penjualan Obat
 * (pengganti getSaldo kas kelas)
 */
function getTotalPenjualan() {
    global $db;
    $q = mysqli_query($db, "SELECT SUM(total) AS t FROM transaksi");
    $d = mysqli_fetch_assoc($q);
    return $d['t'] ?? 0;
}

/**
 * Total Pembelian Obat
 */
function getTotalPembelian() {
    global $db;
    $q = mysqli_query($db, "SELECT SUM(total) AS t FROM pembelian");
    $d = mysqli_fetch_assoc($q);
    return $d['t'] ?? 0;
}

/**
 * Laba / Saldo Toko Obat
 */
function getSaldoToko() {
    return getTotalPenjualan() - getTotalPembelian();
}
?>

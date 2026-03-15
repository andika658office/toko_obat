<?php
include '../../config/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) $_POST['id_supplier'];
    $sql = "DELETE FROM supplier WHERE id_supplier=$id";
    mysqli_query($db, $sql);
}
header("Location: supplier.php");
exit;

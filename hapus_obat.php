<?php
include 'config/app.php';

$id = $_GET['id'];
mysqli_query($db, "DELETE FROM obat WHERE id_obat=$id");

header("Location: data_obat.php");

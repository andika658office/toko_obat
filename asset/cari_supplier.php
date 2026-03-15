<?php
include '../../config/conn.php';

$keyword = $_GET['keyword'] ?? '';

$sql = "SELECT * FROM supplier";
if (!empty($keyword)) {
    $safeKeyword = mysqli_real_escape_string($db, $keyword);
    $sql .= " WHERE nama_supplier LIKE '%$safeKeyword%'";
}
$result = mysqli_query($db, $sql);

if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    echo "<tr class='hover:bg-gray-50'>
            <td class='p-3'>".htmlspecialchars($row['nama_supplier'])."</td>
            <td class='p-3 text-center'>".htmlspecialchars($row['alamat'])."</td>
            <td class='text-center'>".htmlspecialchars($row['no_telepon'])."</td>
            <td class='text-center ".(strtolower($row['BPOM'])=='verified' ? 'text-green-600' : 'text-red-600')."'>".ucfirst($row['BPOM'])."</td>
            <td class='text-center'>
              <span class='".($row['status']=='aktif' ? 'bg-green-100' : 'bg-red-100')." px-2 py-1 rounded'>".ucfirst($row['status'])."</span>
            </td>
          </tr>";
  }
} else {
  echo "<tr><td colspan='5' class='text-center text-gray-500'>Tidak ada data ditemukan</td></tr>";
}

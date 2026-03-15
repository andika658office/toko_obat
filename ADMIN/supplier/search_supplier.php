<?php
include '../../config/conn.php';

$keyword = isset($_GET['q']) ? mysqli_real_escape_string($db, $_GET['q']) : '';

$sql = "SELECT * FROM supplier 
        WHERE LOWER(nama_supplier) LIKE LOWER('%$keyword%') 
        OR LOWER(alamat) LIKE LOWER('%$keyword%') 
        OR LOWER(no_telepon) LIKE LOWER('%$keyword%') 
        OR LOWER(BPOM) LIKE LOWER('%$keyword%') 
        OR LOWER(status) LIKE LOWER('%$keyword%')";

$result = mysqli_query($db, $sql);

echo '<table class="w-full text-sm">
        <thead class="bg-gray-50">
          <tr>
            <th class="p-3 text-left">Supplier</th>
            <th class="p-3">Alamat</th>
            <th class="p-3">Kontak</th>
            <th class="p-3">BPOM</th>
            <th class="p-3">Status</th>
          </tr>
        </thead>
        <tbody>';

if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)) {
    echo '<tr class="hover:bg-gray-50">
            <td class="p-3">'.$row['nama_supplier'].'</td>
            <td class="p-3 text-center">'.$row['alamat'].'</td>
            <td class="text-center">'.$row['no_telepon'].'</td>
            <td class="text-center '.($row['BPOM']=='verified' ? 'text-green-600' : 'text-red-600').'">'.ucfirst($row['BPOM']).'</td>
            <td class="text-center"><span class="'.($row['status']=='aktif' ? 'bg-green-100' : 'bg-red-100').' px-2 py-1 rounded">'.ucfirst($row['status']).'</span></td>
          </tr>';
  }
} else {
  echo '<tr><td colspan="5" class="text-center p-3 text-gray-500">Data tidak ditemukan</td></tr>';
}

echo '</tbody></table>';
?>

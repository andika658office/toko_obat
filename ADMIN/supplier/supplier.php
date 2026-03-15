<?php
include '../../config/conn.php';

// Statistik
$total       = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as total FROM supplier"))['total'];
$aktif       = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as aktif FROM supplier WHERE status='aktif'"))['aktif'];
$kadaluarsa  = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as kadaluarsa FROM supplier WHERE status='tidak aktif'"))['kadaluarsa'];
$bpom        = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as bpom FROM supplier WHERE BPOM='verified'"))['bpom'];

// Filter query
$where = [];
if (!empty($_GET['bpom'])) {
    $bpomFilters = array_map(function($val) use ($db) {
        return "'" . mysqli_real_escape_string($db, $val) . "'";
    }, $_GET['bpom']);
    $where[] = "BPOM IN (" . implode(",", $bpomFilters) . ")";
}
if (!empty($_GET['status'])) {
    $statusFilters = array_map(function($val) use ($db) {
        return "'" . mysqli_real_escape_string($db, $val) . "'";
    }, $_GET['status']);
    $where[] = "status IN (" . implode(",", $statusFilters) . ")";
}

$sql = "SELECT * FROM supplier";
if (!empty($where)) {
    $sql .= " WHERE " . implode(" AND ", $where);
}
$suppliers = mysqli_query($db, $sql); 

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Supplier Obat</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <?php include '../../asset/siderbar.php'?>
</head>
<body class="bg-gray-100 font-sans">

<div class="ml-[260px] p-6">

  <!-- Header -->
  <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
      <h1 class="text-2xl font-bold text-gray-800">Supplier Obat</h1>
      <p class="text-gray-500">Manajemen supplier farmasi & distribusi obat</p>
    </div>

    <div class="flex gap-2 w-full md:w-auto">
      <input type="text" id="searchSupplier" placeholder="Cari supplier..."
        class="flex-1 md:w-80 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400"/>
      <button onclick="toggleFilter()" class="px-4 py-2 border rounded-lg bg-white">Filter</button>
      <button onclick="openModal()" class="px-4 py-2 bg-green-600 text-white rounded-lg">+ Tambah Supplier</button>
    </div>
  </div>

  <!-- Statistik -->
  <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-6">
    <div class="bg-white p-4 rounded-xl shadow"><p>Total Supplier</p><h2><?php echo $total; ?></h2></div>
    <div class="bg-white p-4 rounded-xl shadow"><p>Supplier Aktif</p><h2><?php echo $aktif; ?></h2></div>
    <div class="bg-white p-4 rounded-xl shadow"><p>Izin Kadaluarsa</p><h2><?php echo $kadaluarsa; ?></h2></div>
    <div class="bg-white p-4 rounded-xl shadow"><p>BPOM Verified</p><h2><?php echo $bpom; ?></h2></div>
  </div>

   <!-- Panel Filter -->
  <div id="filterPanel" class="hidden bg-white p-4 rounded-xl shadow mt-4">
    <form method="get" class="flex flex-col gap-4">
      <div>
        <label class="font-semibold">BPOM:</label><br>
        <label><input type="checkbox" name="bpom[]" value="verified"
          <?php if(isset($_GET['bpom']) && in_array('verified', $_GET['bpom'])) echo 'checked'; ?>> Verified</label>
        <label class="ml-4"><input type="checkbox" name="bpom[]" value="not verified"
          <?php if(isset($_GET['bpom']) && in_array('not verified', $_GET['bpom'])) echo 'checked'; ?>> Not Verified</label>
      </div>
      <div>
        <label class="font-semibold">Status:</label><br>
        <label><input type="checkbox" name="status[]" value="aktif"
          <?php if(isset($_GET['status']) && in_array('aktif', $_GET['status'])) echo 'checked'; ?>> Aktif</label>
        <label class="ml-4"><input type="checkbox" name="status[]" value="tidak aktif"
          <?php if(isset($_GET['status']) && in_array('tidak aktif', $_GET['status'])) echo 'checked'; ?>> Tidak Aktif</label>
      </div>
      <div class="flex justify-end">
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg">Terapkan</button>
      </div>
    </form>
  </div>

  <!-- Table Container -->
  <div id="supplierTable" class="bg-white rounded-xl shadow mt-6 overflow-x-auto">
    <table class="w-full text-sm">
      <thead class="bg-gray-50">
        <tr>
          <th class="p-3 text-left">Supplier</th>
          <th class="p-3">Alamat</th>
          <th class="p-3">Kontak</th>
          <th class="p-3">BPOM</th>
          <th class="p-3">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_assoc($suppliers)) { ?>
        <tr class="hover:bg-gray-50">
          <td class="p-3"><?php echo $row['nama_supplier']; ?></td>
          <td class="p-3 text-center"><?php echo $row['alamat']; ?></td>
          <td class="text-center"><?php echo $row['no_telepon']; ?></td>
          <td class="text-center <?php echo $row['BPOM']=='verified' ? 'text-green-600' : 'text-red-600'; ?>">
            <?php echo ucfirst($row['BPOM']); ?>
          </td>
          <td class="text-center">
            <span class="<?php echo $row['status']=='aktif' ? 'bg-green-100' : 'bg-red-100'; ?> px-2 py-1 rounded">
              <?php echo ucfirst($row['status']); ?>
            </span>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<script>
function toggleFilter(){
  const panel = document.getElementById("filterPanel");
  if(panel) panel.classList.toggle("hidden");
}
function openModal(){ /* ...modal code... */ }
function closeModal(){ /* ...modal code... */ }

document.getElementById("searchSupplier").addEventListener("keyup", function() {
  const keyword = this.value;
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "search_supplier.php?q=" + encodeURIComponent(keyword), true);
  xhr.onload = function() {
    if (xhr.status === 200) {
      document.getElementById("supplierTable").innerHTML = xhr.responseText;
    }
  };
  xhr.send();
});
</script>
</body>
</html>



<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

body {
    font-family: 'Inter', sans-serif;
    margin: 0;
    background-color: #f9fafb;
}

/* Container Sidebar */
.sidebar {
    width: 260px;
    height: 100vh;
    background: #fff;
    position: fixed;
    top: 0;
    left: 0;
    border-right: 1px solid #f3f4f6;
    padding: 30px 20px;
}

/* Bagian Logo Besar */
.logo {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 50px;
}

.logo-icon {
    width: 50px;
    height: 50px;
    background: #10b981;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    font-size: 24px;
}

.logo h2 {
    font-size: 24px;
    font-weight: 800;
    color: #000;
    margin: 0;
    letter-spacing: -1px;
}

.logo span {
    font-size: 14px;
    color: #111;
    font-weight: 500;
}


.menu {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.menu-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 12px 18px;
    text-decoration: none;
    color: #4b5563; 
    font-weight: 500;
    font-size: 15px;
    border-radius: 12px;
    transition: all 0.2s ease;
}

.menu-item:hover {
    background: #f9fafb;
    color: #000;
}

.menu-item.active {
    background: #e6f9f2; 
    color: #10b981;      
    font-weight: 600;
}

.menu-item i {
    font-size: 18px;
    width: 20px;
    text-align: center;
}
</style>
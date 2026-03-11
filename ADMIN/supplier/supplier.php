<?php
include '../../config/conn.php';

// Statistik
$total       = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as total FROM supplier"))['total'];
$aktif       = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as aktif FROM supplier WHERE status='aktif'"))['aktif'];
$kadaluarsa  = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as kadaluarsa FROM supplier WHERE status='tidak aktif'"))['kadaluarsa'];
$bpom        = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as bpom FROM supplier WHERE BPOM='verified'"))['bpom'];

// Ambil semua supplier
$suppliers = mysqli_query($db, "SELECT * FROM supplier");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Supplier Obat</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<!-- Sidebar -->
<div class="sidebar">
  <div class="logo">
    <div>
      <h2 class="font-bold text-lg">ObatKu</h2>
      <span class="text-sm text-gray-500">Panel Admin</span>
    </div>
  </div>

 <div class="menu flex flex-col gap-3 mt-6">
  <a href="../laporan.php" class="menu-item">Obat</a>
  <a href="supplier.php" class="menu-item active">Supplier</a>
</div>
</div>

<!-- MAIN CONTENT -->
<div class="ml-[260px] p-6">

  <!-- Header -->
  <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
      <h1 class="text-2xl font-bold text-gray-800">Supplier Obat</h1>
      <p class="text-gray-500">Manajemen supplier farmasi & distribusi obat</p>
    </div>

    <div class="flex gap-2 w-full md:w-auto">
      <input type="text"
        placeholder="Cari nama supplier..."
        class="flex-1 md:w-80 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400"/>

      <button class="px-4 py-2 border rounded-lg bg-white">Filter</button>

      <button class="px-4 py-2 bg-green-600 text-white rounded-lg">
        + Tambah Supplier
      </button>
    </div>
  </div>

  <!-- Statistik -->
  <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-6">
    <div class="bg-white p-4 rounded-xl shadow">
      <p class="text-gray-500">Total Supplier</p>
      <h2 class="text-2xl font-bold mt-2"><?php echo $total; ?></h2>
    </div>

    <div class="bg-white p-4 rounded-xl shadow">
      <p class="text-gray-500">Supplier Aktif</p>
      <h2 class="text-2xl font-bold mt-2"><?php echo $aktif; ?></h2>
    </div>

    <div class="bg-white p-4 rounded-xl shadow">
      <p class="text-gray-500">Izin Kadaluarsa</p>
      <h2 class="text-2xl font-bold mt-2"><?php echo $kadaluarsa; ?></h2>
    </div>

    <div class="bg-white p-4 rounded-xl shadow">
      <p class="text-gray-500">BPOM Verified</p>
      <h2 class="text-2xl font-bold mt-2"><?php echo $bpom; ?></h2>
    </div>
  </div>

  <!-- Table -->
  <div class="bg-white rounded-xl shadow mt-6 overflow-x-auto">
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
</body>
</html>

<style>
.sidebar{
  width:260px;
  height:100vh;
  background:#fff;
  position:fixed;
  border-right:1px solid #e5e7eb;
  padding:25px;
}
.menu-item{
  padding:10px;
  border-radius:8px;
  transition:0.3s;
}
.menu-item:hover{
  background:#f3f4f6;
}
.active{
  background:#10b981;
  color:#fff;
}
</style>

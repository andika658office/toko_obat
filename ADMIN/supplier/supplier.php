<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
      <h2 class="text-2xl font-bold mt-2">87</h2>
    </div>

    <div class="bg-white p-4 rounded-xl shadow">
      <p class="text-gray-500">Supplier Aktif</p>
      <h2 class="text-2xl font-bold mt-2">64</h2>
    </div>

    <div class="bg-white p-4 rounded-xl shadow">
      <p class="text-gray-500">Izin Kadaluarsa</p>
      <h2 class="text-2xl font-bold mt-2">5</h2>
    </div>

    <div class="bg-white p-4 rounded-xl shadow">
      <p class="text-gray-500">BPOM Verified</p>
      <h2 class="text-2xl font-bold mt-2">72</h2>
    </div>
  </div>

  <!-- Table -->
  <div class="bg-white rounded-xl shadow mt-6 overflow-x-auto">
    <table class="w-full text-sm">
      <thead class="bg-gray-50">
        <tr>
          <th class="p-3 text-left">Supplier</th>
          <th class="p-3">Jenis</th>
          <th class="p-3">Kontak</th>
          <th class="p-3">BPOM</th>
          <th class="p-3">Izin</th>
          <th class="p-3">Rating</th>
          <th class="p-3">Status</th>
        </tr>
      </thead>

      <tbody>
        <tr class="hover:bg-gray-50">
          <td class="p-3">Kimia Farma</td>
          <td class="text-center">Generik</td>
          <td class="text-center">021-000</td>
          <td class="text-center text-green-600">Verified</td>
          <td class="text-center">2026</td>
          <td class="text-center">⭐4.9</td>
          <td class="text-center">
            <span class="bg-green-100 px-2 py-1 rounded">Aktif</span>
          </td>
        </tr>
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

.logo-icon{
  background:#10b981;
  color:#fff;
  padding:10px;
  border-radius:10px;
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

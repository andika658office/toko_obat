-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Feb 2026 pada 02.21
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_obat_test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_satuan` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_obat`, `jumlah`, `harga_satuan`, `total`) VALUES
(1, 1, 2, 2, 5000.00, 10000.00),
(2, 1, 6, 1, 8000.00, 8000.00),
(3, 2, 3, 1, 15000.00, 15000.00),
(4, 2, 9, 2, 12000.00, 24000.00),
(5, 3, 1, 1, 25000.00, 25000.00),
(6, 4, 8, 1, 18000.00, 18000.00),
(7, 5, 5, 1, 30000.00, 30000.00),
(8, 6, 7, 2, 10000.00, 20000.00),
(9, 7, 10, 3, 10000.00, 30000.00),
(10, 8, 4, 2, 12000.00, 24000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_obat`
--

CREATE TABLE `kategori_obat` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_obat`
--

INSERT INTO `kategori_obat` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Analgesik'),
(1, 'Antibiotik'),
(4, 'Antihistamin'),
(5, 'Antijamur'),
(6, 'Antipiretik'),
(7, 'Antiseptik'),
(8, 'Obat Batuk'),
(9, 'Obat Flu'),
(10, 'Suplemen Herbal'),
(3, 'Vitamin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(11) DEFAULT 0,
  `expired_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `id_kategori`, `harga`, `stok`, `expired_date`) VALUES
(1, 'Amoxicillin', 1, 25000.00, 50, '2026-12-01'),
(2, 'Paracetamol', 6, 5000.00, 100, '2027-01-15'),
(3, 'Ibuprofen', 2, 15000.00, 80, '2026-11-20'),
(4, 'Cetirizine', 4, 12000.00, 60, '2026-09-10'),
(5, 'Fluconazole', 5, 30000.00, 40, '2027-03-05'),
(6, 'Vitamin C', 3, 8000.00, 200, '2027-05-01'),
(7, 'Betadine', 7, 10000.00, 70, '2026-08-25'),
(8, 'OBH Combi', 8, 18000.00, 90, '2026-10-30'),
(9, 'Decolgen', 9, 12000.00, 120, '2026-12-15'),
(10, 'Kunyit Asam', 10, 10000.00, 150, '2027-06-01'),
(15, 'iphone paramex', 1, 12000.00, 12, '2026-02-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat_supplier`
--

CREATE TABLE `obat_supplier` (
  `id_obat` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `obat_supplier`
--

INSERT INTO `obat_supplier` (`id_obat`, `id_supplier`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `no_telepon`) VALUES
(1, 'PT Sehat Sentosa', 'Jakarta', '0211234567'),
(2, 'CV Farma Jaya', 'Bandung', '0229876543'),
(3, 'PT Herbalindo', 'Yogyakarta', '0274123456'),
(4, 'Apotek Nusantara', 'Surabaya', '0317654321'),
(5, 'PT Medika Prima', 'Semarang', '0248765432'),
(6, 'CV Obat Sehat', 'Banjarmasin', '0511321456'),
(7, 'PT Vita Pharma', 'Makassar', '0411987654'),
(8, 'PT Indo Farma', 'Medan', '0612345678'),
(9, 'CV Sumber Sehat', 'Palembang', '0711987654'),
(10, 'PT Global Medika', 'Balikpapan', '0542765432');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal`, `id_user`) VALUES
(1, '2026-02-01 02:00:00', 2),
(2, '2026-02-02 06:30:00', 2),
(3, '2026-02-03 01:15:00', 2),
(4, '2026-02-04 08:45:00', 2),
(5, '2026-02-05 03:20:00', 2),
(6, '2026-02-06 05:00:00', 2),
(7, '2026-02-07 07:40:00', 2),
(8, '2026-02-08 09:25:00', 2),
(9, '2026-02-09 04:10:00', 2),
(10, '2026-02-10 10:55:00', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'zuyan', '$2y$10$O5JaCVyemvz71sV7/OaU/egj1rn72AwG80V.16.S4ZuAK1Lxow.D6', 'admin'),
(2, 'zuyan32', '$2y$10$dnMvJM1NVqb4vlrpDKA30un3qqfLC4IyWJL4B9Q61IpoX5MJ6KwyC', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indeks untuk tabel `kategori_obat`
--
ALTER TABLE `kategori_obat`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `nama_kategori` (`nama_kategori`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD UNIQUE KEY `nama_obat` (`nama_obat`,`id_kategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `obat_supplier`
--
ALTER TABLE `obat_supplier`
  ADD PRIMARY KEY (`id_obat`,`id_supplier`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`),
  ADD UNIQUE KEY `nama_supplier` (`nama_supplier`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_id` (`role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kategori_obat`
--
ALTER TABLE `kategori_obat`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`);

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_obat` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `obat_supplier`
--
ALTER TABLE `obat_supplier`
  ADD CONSTRAINT `obat_supplier_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`),
  ADD CONSTRAINT `obat_supplier_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

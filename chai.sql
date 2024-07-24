-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2024 pada 20.26
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `barang_nama` varchar(30) NOT NULL,
  `barang_spesifikasi` varchar(30) NOT NULL,
  `barang_lokasi` varchar(30) NOT NULL,
  `barang_kondisi` varchar(30) NOT NULL,
  `barang_jumlah` varchar(30) NOT NULL,
  `barang_sumber_dana` varchar(30) NOT NULL,
  `barang_jenis` varchar(30) NOT NULL,
  `barang_keterangan` varchar(30) NOT NULL,
  `barang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`barang_nama`, `barang_spesifikasi`, `barang_lokasi`, `barang_kondisi`, `barang_jumlah`, `barang_sumber_dana`, `barang_jenis`, `barang_keterangan`, `barang_id`) VALUES
('Bedak Bayi', 'Alat Kecantikan', 'Jakarta', 'Baik', '10000', 'Korea', '', 'Baik', 12),
('Lipgols', 'Alat Kecantikan', 'Jakarta', 'Baik', '30000', 'Korea', '', 'Baik', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `bk_nama_barang` varchar(30) NOT NULL,
  `bk_tanggal_keluar` date NOT NULL,
  `bk_jumlah_keluar` bigint(255) NOT NULL,
  `bk_lokasi` varchar(100) NOT NULL,
  `bk_penerima` varchar(30) NOT NULL,
  `bk_keterangan` varchar(30) NOT NULL,
  `bk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`bk_nama_barang`, `bk_tanggal_keluar`, `bk_jumlah_keluar`, `bk_lokasi`, `bk_penerima`, `bk_keterangan`, `bk_id`) VALUES
('Bedak Bayi', '2024-07-01', 5000, 'Jakarta', 'Bella', 'Baik', 15),
('Bedak Bayi', '2024-07-01', 5000, 'Jakarta', 'Bella', 'Baik', 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `bm_id` int(11) NOT NULL,
  `bm_id_barang` int(11) NOT NULL,
  `bm_id_suplier` int(11) NOT NULL,
  `bm_tgl_masuk` date NOT NULL,
  `bm_jumlah` int(11) NOT NULL,
  `user_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`bm_id`, `bm_id_barang`, `bm_id_suplier`, `bm_tgl_masuk`, `bm_jumlah`, `user_foto`) VALUES
(4, 12, 1, '2024-07-01', 10000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE `suplier` (
  `suplier_id` int(11) NOT NULL,
  `suplier_nama` varchar(100) NOT NULL,
  `suplier_alamat` text DEFAULT NULL,
  `suplier_telepon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `suplier`
--

INSERT INTO `suplier` (`suplier_id`, `suplier_nama`, `suplier_alamat`, `suplier_telepon`) VALUES
(1, 'PT Wiguna Berkat Melimpah ', 'Jl.Taman Cimanggu', '082240819775');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_nama` varchar(100) NOT NULL,
  `user_foto` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `user_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_nama`, `user_foto`, `id`, `username`, `password`, `user_level`) VALUES
('Ahmad Jhony', '705931782_mahasiswa961111255_VID-20180629-WA0001.jpg', 1, 'admin', '0192023a7bbd73250516f069df18b500', 'administrator'),
('', '1748346971_WhatsApp Image 2024-05-06 at 09.23.02 (1).jpeg', 2, 'admin', '$2y$10$4cLzRO3ujNvCq4x04qdF6.F0HTd4nTgWWPVM98IUYR5PHpgFzSqrO', ''),
('', '124946111_WhatsApp Image 2024-05-06 at 09.23.02.jpeg', 3, 'ryan', '$2y$10$48IXZ/jcf70iU8BrQluG9e5FKQGPh08gDolznuIAy70ct7tx8uoLO', ''),
('Maimun', '', 6, 'manajemen', '7839a6a91b6a99d4c29852a0beaa18c8', 'manajemen'),
('ajir muhajir', '', 7, 'ajir', '80a3d2ba8cda33613c9f46446c4b262c', 'manajemen'),
('chairul', NULL, 8, 'chairul', '123', 'administrator'),
('', '1489409715_1IZJOL.png', 9, 'herman', '$2y$10$jDxEFRNTsuCs6UTXiKmQu.W6eXxZD6Dt54Yk8Ij275opTl4mYGC4S', ''),
('adis Ismawati', NULL, 10, 'adisi', '123', 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`bk_id`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`bm_id`),
  ADD KEY `bm_id_barang` (`bm_id_barang`),
  ADD KEY `bm_id_suplier` (`bm_id_suplier`);

--
-- Indeks untuk tabel `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `bk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `bm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `suplier`
--
ALTER TABLE `suplier`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`bm_id_barang`) REFERENCES `barang` (`barang_id`),
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`bm_id_suplier`) REFERENCES `suplier` (`suplier_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

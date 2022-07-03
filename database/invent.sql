-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Mar 2022 pada 02.00
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invent`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `no_hp`, `keterangan`, `id_level`) VALUES
(1, 'juned', 'jnd', 'Juned Setiawan', '+62 82-365-265-904', 'Web Developer | Newbie', 1),
(3, 'iwan', '01ccce480c60fcdb67b54f4509ffdb56', 'Iwan Daroini', '083742918201', 'Freelance | Newbie', 2),
(7, 'lost', '1c9a44eb2e8eaf3da1eb551da310cce7', 'Lost', '08217632819', 'Simple People', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktivitas_log`
--

CREATE TABLE `aktivitas_log` (
  `tanggal_log` datetime NOT NULL,
  `ip` varchar(20) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `browser` varchar(50) NOT NULL,
  `status` varchar(200) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aktivitas_log`
--

INSERT INTO `aktivitas_log` (`tanggal_log`, `ip`, `agent`, `browser`, `status`, `id_level`) VALUES
('2022-03-05 10:51:11', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Tambah Barang Perawatan', 3),
('2022-03-05 10:58:12', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:97.0) Gecko/20100101 Firefox/97.0', 'Firefox', 'Tambah Barang perbaikan', 3),
('2022-03-05 11:23:28', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Menambah Barang Inventaris', 2),
('2022-03-05 11:24:55', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Mengubah Barang Inventaris', 2),
('2022-03-05 11:25:05', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Menghapus Barang Inventaris', 2),
('2022-03-05 11:26:18', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Mensetujui Barang Perbaikan', 2),
('2022-03-05 21:17:33', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Menambah Barang Inventaris', 2),
('2022-03-06 10:43:56', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Menambah Barang Inventaris', 1),
('2022-03-06 11:49:39', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Menambah Barang Inventaris', 2),
('2022-03-06 21:04:31', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Menerima Inventaris', 3),
('2022-03-06 21:04:42', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Tambah Barang perbaikan', 3),
('2022-03-06 21:07:43', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Tambah Barang Perawatan', 3),
('2022-03-06 21:08:17', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Mensetujui Barang Perbaikan', 2),
('2022-03-06 21:09:50', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Menambah Barang Inventaris', 1),
('2022-03-07 07:55:29', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Mensetujui Barang Perbaikan', 2),
('2022-03-08 07:22:43', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Mengubah Barang Inventaris', 2),
('2022-03-08 07:22:58', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Mengubah Barang Inventaris', 2),
('2022-03-08 07:23:35', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Menambah Barang Inventaris', 2),
('2022-03-08 07:26:25', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Tambah Barang Perawatan', 3),
('2022-03-08 07:31:51', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Menerima Inventaris', 3),
('2022-03-08 07:32:07', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Tambah Barang perbaikan', 3),
('2022-03-08 07:36:43', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Menambah Barang Inventaris', 2),
('2022-03-08 07:37:10', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Menerima Inventaris', 3),
('2022-03-08 10:40:57', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Menerima Inventaris', 3),
('2022-03-08 10:43:52', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Menerima Inventaris', 3),
('2022-03-08 10:48:14', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Menerima Inventaris', 3),
('2022-03-08 10:48:26', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Menerima Inventaris', 3),
('2022-03-08 10:54:30', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Mensetujui Barang Perbaikan', 2),
('2022-03-08 10:55:08', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Menerima Inventaris', 3),
('2022-03-08 10:55:15', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Menerima Inventaris', 3),
('2022-03-09 07:38:15', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Menambah Barang Inventaris', 1),
('2022-03-09 07:38:22', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Menghapus Barang Inventaris', 1),
('2022-03-09 07:39:34', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Mensetujui Barang Perbaikan', 1),
('2022-03-09 09:30:27', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'Chrome', 'Menambah Barang Inventaris', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `id_Inventaris` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `berita` varchar(200) NOT NULL,
  `id_operator` int(11) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `id_Inventaris`, `tanggal`, `berita`, `id_operator`, `id_level`) VALUES
(16, 96, '2022-03-08', 'Operator Dengan Nama : Dani Setiawan Sudah Menerima Barang <i><b>Mouse</i></b> dengan Jumlah : 10', 4, 3),
(17, 98, '2022-03-08', 'Operator Dengan Nama : Dani Setiawan Sudah Menerima Barang <i><b>Keyboard</i></b> dengan Jumlah : 4', 4, 3),
(18, 94, '2022-03-08', 'Operator Dengan Nama : Palen Bio Sudah Menerima Barang <i><b>Kursi</i></b> dengan Jumlah : 5', 2, 3),
(19, 95, '2022-03-08', 'Operator Dengan Nama : Palen Bio Sudah Menerima Barang <i><b>Meja</i></b> dengan Jumlah : 2', 2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dana`
--

CREATE TABLE `dana` (
  `id_dana` int(11) NOT NULL,
  `nama_dana` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dana`
--

INSERT INTO `dana` (`id_dana`, `nama_dana`) VALUES
(1, 'Dana Bos'),
(2, 'Dana Komite');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `id_inventaris` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kondisi` varchar(45) DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal_register` date NOT NULL,
  `tahun_anggaran` int(10) NOT NULL,
  `kode_inventaris` varchar(45) NOT NULL,
  `nomor` int(11) NOT NULL,
  `id_dana` int(11) NOT NULL,
  `kode_jenis` varchar(45) NOT NULL,
  `kode_jurusan` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `stat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`id_inventaris`, `nama`, `kondisi`, `keterangan`, `jumlah`, `tanggal_register`, `tahun_anggaran`, `kode_inventaris`, `nomor`, `id_dana`, `kode_jenis`, `kode_jurusan`, `id_ruang`, `id_level`, `stat`) VALUES
(94, 'Kursi', 'Baik', 'ds', 5, '2022-03-08', 2022, '502.A-7.1.2022.854', 854, 1, 'A-7', 502, 14, 3, 1),
(95, 'Meja', 'Baik', '', 2, '2022-03-06', 2022, '502.A-7.1.2022.650', 650, 1, 'A-7', 502, 13, 3, 1),
(96, 'Mouse', 'Rusak', '', 10, '2022-03-06', 2022, '204.A-7.1.2022.815', 815, 1, 'A-7', 204, 12, 1, 1),
(97, 'Papan Tulis', 'Rusak', '', 5, '2022-03-08', 2022, '204.A-7.2.2022.956', 956, 2, 'A-7', 204, 12, 3, 0),
(98, 'Keyboard', 'Rusak', '', 4, '2022-03-08', 2022, '204.A-7.1.2022.536', 536, 1, 'A-7', 204, 12, 3, 1),
(100, 'Pensil', 'Rusak', '', 5, '2022-03-09', 2022, '502.A-7.1.2022.555', 555, 1, 'A-7', 502, 14, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(100) DEFAULT NULL,
  `kode_jenis` varchar(45) DEFAULT NULL,
  `keterangan_jenis` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `kode_jenis`, `keterangan_jenis`) VALUES
(16, 'Otomotif', 'A-4', 'Alat Sepeda Motor'),
(17, 'Smartphone', 'A-9', 'Alat Komunikasi'),
(20, 'Properti', 'A-7', 'Alat Kelas Sekolah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  `kode_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `kode_jurusan`) VALUES
(1, 'RPL', 204),
(2, 'EI', 404),
(3, 'OI', 502),
(4, 'TPM', 101);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `role`) VALUES
(1, 'admin'),
(2, 'manager'),
(3, 'operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE `operator` (
  `id_operator` int(11) NOT NULL,
  `nama_oper` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `kode_jurusan` int(11) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `operator`
--

INSERT INTO `operator` (`id_operator`, `nama_oper`, `username`, `password`, `no_hp`, `keterangan`, `kode_jurusan`, `id_level`) VALUES
(2, 'Palen Bio', 'palen', '4a7b161a6d53361fc5156ef45e03bffc', '085461782901', 'Originator | Newbie', 502, 3),
(4, 'Dani Setiawan', 'dani', '55b7e8b895d047537e672250dd781555', '082297210652', 'Operator Baru', 204, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perawatan`
--

CREATE TABLE `perawatan` (
  `id_perawatan` int(11) NOT NULL,
  `id_inventaris` int(11) NOT NULL,
  `tanggal_perawatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perawatan`
--

INSERT INTO `perawatan` (`id_perawatan`, `id_inventaris`, `tanggal_perawatan`) VALUES
(58, 94, '2022-03-06'),
(59, 95, '2022-03-06'),
(60, 96, '2022-03-08'),
(61, 98, '2022-03-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbaikan`
--

CREATE TABLE `perbaikan` (
  `id_perbaikan` int(11) NOT NULL,
  `id_perawatan` int(11) NOT NULL,
  `id_inventaris` int(11) NOT NULL,
  `tanggal_perbaikan` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `status_perbaikan` int(11) NOT NULL,
  `id_operator` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `perbaikan`
--

INSERT INTO `perbaikan` (`id_perbaikan`, `id_perawatan`, `id_inventaris`, `tanggal_perbaikan`, `tanggal_selesai`, `status_perbaikan`, `id_operator`, `id_admin`) VALUES
(66, 58, 94, '2022-03-06', '2022-03-07', 3, 2, 0),
(67, 59, 95, '2022-03-07', '2022-03-08', 3, 0, 1),
(68, 60, 96, '2022-03-08', '0000-00-00', 2, 4, 0),
(69, 61, 98, '2022-03-09', '0000-00-00', 2, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(45) DEFAULT NULL,
  `kode_ruang` varchar(45) DEFAULT NULL,
  `keterangan_ruang` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `kode_ruang`, `keterangan_ruang`) VALUES
(12, 'RUANG 1', '1021', 'Penuh'),
(13, 'RUANG 2', '1324', 'Kurang'),
(14, 'RUANG 3', '1423', 'Baik'),
(15, 'RUANG 4', '1132', 'Buruk');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_level` (`id_level`);

--
-- Indeks untuk tabel `aktivitas_log`
--
ALTER TABLE `aktivitas_log`
  ADD KEY `id_level` (`id_level`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_operator` (`id_operator`),
  ADD KEY `id_level` (`id_level`),
  ADD KEY `kode_Inventaris` (`id_Inventaris`);

--
-- Indeks untuk tabel `dana`
--
ALTER TABLE `dana`
  ADD PRIMARY KEY (`id_dana`);

--
-- Indeks untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_inventaris`),
  ADD UNIQUE KEY `kode_inventaris` (`kode_inventaris`),
  ADD KEY `id_ruang` (`id_ruang`),
  ADD KEY `id_manager` (`id_level`),
  ADD KEY `id_dana` (`id_dana`),
  ADD KEY `kode_jenis` (`kode_jenis`),
  ADD KEY `kode_jurusan` (`kode_jurusan`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`),
  ADD UNIQUE KEY `kode_jenis` (`kode_jenis`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD UNIQUE KEY `kode_jurusan` (`kode_jurusan`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_operator`),
  ADD KEY `id_level` (`id_level`),
  ADD KEY `kode_jurusan` (`kode_jurusan`);

--
-- Indeks untuk tabel `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`id_perawatan`),
  ADD KEY `id_inventaris` (`id_inventaris`);

--
-- Indeks untuk tabel `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD PRIMARY KEY (`id_perbaikan`),
  ADD KEY `id_perawatan` (`id_perawatan`),
  ADD KEY `id_inventaris` (`id_inventaris`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `dana`
--
ALTER TABLE `dana`
  MODIFY `id_dana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id_inventaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `operator`
--
ALTER TABLE `operator`
  MODIFY `id_operator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `perawatan`
--
ALTER TABLE `perawatan`
  MODIFY `id_perawatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `perbaikan`
--
ALTER TABLE `perbaikan`
  MODIFY `id_perbaikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `aktivitas_log`
--
ALTER TABLE `aktivitas_log`
  ADD CONSTRAINT `aktivitas_log_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_2` FOREIGN KEY (`id_operator`) REFERENCES `operator` (`id_operator`),
  ADD CONSTRAINT `berita_ibfk_3` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`),
  ADD CONSTRAINT `berita_ibfk_4` FOREIGN KEY (`id_Inventaris`) REFERENCES `inventaris` (`id_inventaris`);

--
-- Ketidakleluasaan untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `inventaris_ibfk_10` FOREIGN KEY (`kode_jurusan`) REFERENCES `jurusan` (`kode_jurusan`),
  ADD CONSTRAINT `inventaris_ibfk_11` FOREIGN KEY (`kode_jenis`) REFERENCES `jenis` (`kode_jenis`),
  ADD CONSTRAINT `inventaris_ibfk_4` FOREIGN KEY (`id_dana`) REFERENCES `dana` (`id_dana`),
  ADD CONSTRAINT `inventaris_ibfk_6` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventaris_ibfk_9` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`);

--
-- Ketidakleluasaan untuk tabel `operator`
--
ALTER TABLE `operator`
  ADD CONSTRAINT `operator_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `operator_ibfk_3` FOREIGN KEY (`kode_jurusan`) REFERENCES `jurusan` (`kode_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `perawatan`
--
ALTER TABLE `perawatan`
  ADD CONSTRAINT `perawatan_ibfk_1` FOREIGN KEY (`id_inventaris`) REFERENCES `inventaris` (`id_inventaris`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD CONSTRAINT `perbaikan_ibfk_2` FOREIGN KEY (`id_perawatan`) REFERENCES `perawatan` (`id_perawatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `perbaikan_ibfk_3` FOREIGN KEY (`id_inventaris`) REFERENCES `inventaris` (`id_inventaris`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

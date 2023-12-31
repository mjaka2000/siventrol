-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jan 2024 pada 17.11
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siventrol`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `unit` varchar(5) NOT NULL,
  `harga_beli` varchar(50) NOT NULL,
  `harga_jual` varchar(50) NOT NULL,
  `diskon` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `unit`, `harga_beli`, `harga_jual`, `diskon`) VALUES
('BRG-1', 'HP Samsung A5', 'pcs', '4500000', '5000000', '0'),
('BRG-2', 'Indomie Goreng', 'pcs', '3000', '3500', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `id_brg_msk` varchar(10) NOT NULL,
  `tgl_transaksi_bm` date NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `tot_harga_bm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_barang_masuk`
--

INSERT INTO `tb_barang_masuk` (`id_brg_msk`, `tgl_transaksi_bm`, `id_supplier`, `tot_harga_bm`) VALUES
('BM-1', '2024-01-09', 'SPL-1', '4,506,000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_det_brg_msk`
--

CREATE TABLE `tb_det_brg_msk` (
  `id_det_brg_msk` int(10) NOT NULL,
  `id_brg_msk` varchar(10) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `qty_masuk` int(10) NOT NULL,
  `status_bm` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_det_brg_msk`
--

INSERT INTO `tb_det_brg_msk` (`id_det_brg_msk`, `id_brg_msk`, `id_barang`, `qty_masuk`, `status_bm`) VALUES
(3, 'BM-1', 'BRG-1', 1, 1),
(4, 'BM-1', 'BRG-2', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` varchar(10) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat_pelanggan` varchar(50) NOT NULL,
  `kota_pelanggan` varchar(25) NOT NULL,
  `email_pelanggan` varchar(25) NOT NULL,
  `kontak_pelanggan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` varchar(50) NOT NULL,
  `kota_supplier` varchar(25) NOT NULL,
  `email_supplier` varchar(25) NOT NULL,
  `kontak_supplier` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `kota_supplier`, `email_supplier`, `kontak_supplier`) VALUES
('SPL-1', 'Wanda', 'Jl. Sungai Miai', 'BJM', 'wanda12@gmail.com', '0896152637163');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `nama_lengkap`, `password`, `level`, `last_login`) VALUES
(1, 'admin', 'Admin', '$2y$10$IzLuU6uxyHkApMWHK.TinuHPi1bfF1ty1H/X5RqJ5V545b4gvz9sW', 0, '2024-01-09 21:49:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`id_brg_msk`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `tb_det_brg_msk`
--
ALTER TABLE `tb_det_brg_msk`
  ADD PRIMARY KEY (`id_det_brg_msk`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_brg_msk` (`id_brg_msk`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_det_brg_msk`
--
ALTER TABLE `tb_det_brg_msk`
  MODIFY `id_det_brg_msk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

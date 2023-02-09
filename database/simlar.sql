-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Des 2022 pada 05.18
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simlar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('d4q62l2fap5oc3iuvq2g4gbd76q1c5av', '::1', 1670773462, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637333434343339323b757365726e616d657c733a343a2274657374223b6c6576656c7c733a353a2241444d494e223b7569647c733a31303a2231363733343434333838223b7374617475737c733a363a226c6f67676564223b),
('n6643lhkh3bb4hn5or46ra7q0mddlufh', '::1', 1670847252, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637303834373231333b757365726e616d657c733a353a2261646d696e223b6c6576656c7c733a353a2241444d494e223b7569647c733a31313a223230323231313131303031223b7374617475737c733a363a226c6f67676564223b),
('ocf67e1kecvipdp5i7a07fnghf6duvu1', '127.0.0.1', 1670905022, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637303930343934313b757365726e616d657c733a333a22646576223b6c6576656c7c733a353a2241444d494e223b7569647c733a313a2231223b7374617475737c733a363a226c6f67676564223b);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `cid` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `griya_id` varchar(20) NOT NULL,
  `golongan` varchar(100) NOT NULL,
  `nomor_meter` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `input_by` varchar(20) NOT NULL,
  `inserted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`cid`, `nama`, `alamat`, `griya_id`, `golongan`, `nomor_meter`, `status`, `input_by`, `inserted_at`) VALUES
('1673444499', 'AGUS', 'Jl. Anggur No. 1', '1673444443', '', '11111', 1, '1673444388', '2023-01-11 13:01:39'),
('1673444523', 'BAMBANG', 'Jl. Belimbing No. 2', '1673444470', '', '22222', 1, '1673444388', '2023-01-11 13:01:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `griya`
--

CREATE TABLE `griya` (
  `id` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `biaya_mtc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `griya`
--

INSERT INTO `griya` (`id`, `nama`, `alamat`, `biaya_mtc`) VALUES
('1673444443', 'GRIYA UTAMA BANJADROWO BARU', 'Banjardowo, Genuk, Semarang.', '5000'),
('1673444470', 'GRIYA UTAMA BANJARDOWO LAMA', 'Banjardowo Lama, Genuk, Semarang', '10000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kartu_meter`
--

CREATE TABLE `kartu_meter` (
  `id` varchar(20) NOT NULL,
  `cid` varchar(20) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `periode` year(4) NOT NULL,
  `aka_lalu` double NOT NULL,
  `aka_akhir` double NOT NULL,
  `jlh_pakai` double NOT NULL,
  `jlh_biaya` bigint(20) NOT NULL,
  `biaya_per_meter` bigint(20) NOT NULL,
  `inserted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kartu_meter`
--

INSERT INTO `kartu_meter` (`id`, `cid`, `bulan`, `periode`, `aka_lalu`, `aka_akhir`, `jlh_pakai`, `jlh_biaya`, `biaya_per_meter`, `inserted_at`) VALUES
('1670903117', '1673444499', '01', 2022, 10, 10, 10, 30000, 2500, '2022-12-13 03:45:17'),
('1670903125', '1673444523', '02', 2022, 15, 15, 15, 47500, 2500, '2022-12-13 03:45:25'),
('1670903132', '1673444499', '02', 2022, 10, 25, 15, 42500, 2500, '2022-12-13 03:45:32'),
('1670903142', '1673444523', '03', 2022, 15, 35, 20, 60000, 2500, '2022-12-13 03:45:42'),
('1670903150', '1673444499', '03', 2022, 25, 40, 15, 42500, 2500, '2022-12-13 03:45:50'),
('1670903160', '1673444499', '04', 2022, 40, 65, 25, 67500, 2500, '2022-12-13 03:46:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setup`
--

CREATE TABLE `setup` (
  `sid` int(11) NOT NULL,
  `trx` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `nilai` varchar(200) NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setup`
--

INSERT INTO `setup` (`sid`, `trx`, `tipe`, `nilai`, `updated_by`, `updated_at`) VALUES
(1, 'NAMA', 'USAHA', 'CV. GRIYA UTAMA WATER', '20221111001', '2022-11-21 06:47:28'),
(2, 'ALAMAT', 'USAHA', 'Jl. Genuk Banjardowo', '1670490004', '2022-12-08 09:08:36'),
(3, 'BIAYA', 'M3', '2500', '1670490004', '2022-12-08 09:08:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `uid` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `level` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`uid`, `nama`, `username`, `password`, `level`, `created_at`, `updated_at`) VALUES
('1', 'Dev', 'dev', '96e79218965eb72c92a549dd5a330112', 'ADMIN', '2022-12-13 09:29:50', '2022-12-13 03:29:05'),
('20221111001', 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN', '2022-11-01 08:22:14', '2022-12-10 10:12:09');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indeks untuk tabel `griya`
--
ALTER TABLE `griya`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kartu_meter`
--
ALTER TABLE `kartu_meter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setup`
--
ALTER TABLE `setup`
  ADD PRIMARY KEY (`sid`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `setup`
--
ALTER TABLE `setup`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

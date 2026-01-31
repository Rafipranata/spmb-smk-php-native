-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jan 2026 pada 08.30
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
-- Database: `db_spmb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '$2a$12$u7g6LIEVCNvQDzKx8tOL3O8QD6tBZs/XJR4qfL27oQFFgJXvlAwE2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pendaftaran` varchar(4) NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `asal_sekolah` varchar(200) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `tgl_lahir` varchar(100) NOT NULL,
  `nama_ayah` varchar(200) DEFAULT NULL,
  `nama_ibu` varchar(200) DEFAULT NULL,
  `pekerjaan_ayah` varchar(200) DEFAULT NULL,
  `pekerjaan_ibu` varchar(200) DEFAULT NULL,
  `gaji_ortu` varchar(200) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Pending',
  `verifikasi_jurusan` varchar(100) NOT NULL DEFAULT 'Pending',
  `jurusan_pertama` varchar(100) NOT NULL,
  `jurusan_kedua` varchar(100) DEFAULT NULL,
  `alamat_siswa` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `kode_pendaftaran`, `id_users`, `nama`, `asal_sekolah`, `nis`, `nik`, `email`, `no_telp`, `tgl_lahir`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `gaji_ortu`, `jenis_kelamin`, `agama`, `status`, `verifikasi_jurusan`, `jurusan_pertama`, `jurusan_kedua`, `alamat_siswa`, `created_at`, `updated_at`) VALUES
(3, '5064', 2, 'Rafi Pranata', 'SMPN 2 TAMAN', '1234567', '3327092505070004', 'admin1@gmail.com', '8912345678', '25-05-2007', NULL, NULL, NULL, NULL, NULL, 'Laki-laki', 'Islam', 'Pending', 'PPLG', 'PPLG', 'TJKT', 'Banjardawa', '2026-01-04 04:55:51', '2026-01-27 08:07:39'),
(29, '5190', 1, 'Rina Sari', 'SMP Negeri 1 Taman', '123456', '9876543210123456', 'rina.sari@example.com', '08123456789', '2005-06-15', 'Ahmad Supriyadi', 'Siti Aminah', 'Tidak Bekerja', 'Petani', '1000000-2000000', 'Laki-laki', 'Hindu', 'Terverifikasi', 'DKV', 'DKV', 'AKL', 'Jl. Merpati No. 20, Taman, Jawa Timur', '2026-01-31 07:25:53', '2026-01-31 07:28:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Rafi Pranata', 'user@gmail.com', '$2a$12$sLaNAW2Sb1tqFAqABIxnPeSPPFQDw3Kc/g2sZh9egwi0eFX4kCF62'),
(2, 'Rafi Pranata', 'admin@gmail.com', '$2y$10$EATrqMhz/g6Hal34/yGy7uQLaJaAbKBk.mX.5Syz061Z5eZRr4TPC'),
(3, 'tio agung', 'tio@gmail.com', '$2y$10$Lj.LkDErUlXFPh6GaBRKt.71IZ/rcxvasDCi7ftYtxKoOuHEgFMDO'),
(4, 'Rafi', '123@gmail.com', '$2y$10$6lPreLpDLY7gksrDrNOw8Ob8VdzfDVQhQD7q/7dNaecMLdvrJoQWm');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pendaftaran_users` (`id_users`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `fk_pendaftaran_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

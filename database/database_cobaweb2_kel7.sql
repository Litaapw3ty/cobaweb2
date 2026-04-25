-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 27 Des 2025 pada 03.07
-- Versi server: 8.0.30
-- Versi PHP: 8.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Basis data: `cobaweb2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(4, 'user', 'Regular User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 10),
(1, 18),
(4, 11),
(4, 12),
(4, 13),
(4, 14),
(4, 15),
(4, 16),
(4, 19),
(4, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'Lita', 2, '2025-12-20 09:51:24', 0),
(2, '::1', 'Majlista12', 3, '2025-12-20 09:54:09', 0),
(3, '::1', 'jlistaptr@gmail.com', 5, '2025-12-20 10:09:02', 0),
(4, '::1', 'jlistaptr@gmail.com', NULL, '2025-12-20 10:23:01', 0),
(5, '::1', 'taklimcuantik@gmail.com', NULL, '2025-12-20 10:24:55', 0),
(6, '::1', 'adm@gmail.com', 6, '2025-12-20 10:35:56', 1),
(7, '::1', 'jefri@gmail.com', 7, '2025-12-21 08:52:25', 1),
(8, '::1', 'adm@gmail.com', 10, '2025-12-22 16:28:15', 1),
(9, '::1', 'adm@gmail.com', 10, '2025-12-22 19:33:27', 1),
(10, '::1', 'fifi@gmail.com', 11, '2025-12-22 19:39:52', 1),
(11, '::1', 'adm@gmail.com', 10, '2025-12-22 19:47:52', 1),
(12, '::1', 'adminn@gmail.com', 12, '2025-12-22 19:48:40', 1),
(13, '::1', 'adm@gmail.com', 10, '2025-12-22 20:14:44', 1),
(14, '::1', 'adm@gmail.com', 10, '2025-12-22 20:16:01', 1),
(15, '::1', 'adm@gmail.com', 10, '2025-12-22 21:05:36', 1),
(16, '::1', 'adm@gmail.com', 10, '2025-12-22 21:25:16', 1),
(17, '::1', 'adm@gmail.com', 10, '2025-12-22 21:35:05', 1),
(18, '::1', 'adm@gmail.com', 10, '2025-12-22 21:39:52', 1),
(19, '::1', 'adm@gmail.com', NULL, '2025-12-22 21:47:40', 0),
(20, '::1', 'adm@gmail.com', NULL, '2025-12-22 21:47:53', 0),
(21, '::1', 'adm@gmail.com', 10, '2025-12-22 21:48:01', 1),
(22, '::1', 'adm@gmail.com', 10, '2025-12-22 22:02:52', 1),
(23, '::1', 'adm@gmail.com', 10, '2025-12-22 22:05:02', 1),
(24, '::1', 'adm@gmail.com', 10, '2025-12-22 23:08:32', 1),
(25, '::1', 'adm@gmail.com', 10, '2025-12-23 13:51:57', 1),
(26, '::1', 'fifi', NULL, '2025-12-23 18:49:31', 0),
(27, '::1', 'fifi', NULL, '2025-12-23 18:49:39', 0),
(28, '::1', 'minul@gmail.com', 13, '2025-12-23 18:50:13', 1),
(29, '::1', 'minul@gmail.com', 13, '2025-12-23 19:02:30', 1),
(30, '::1', 'adm@gmail.com', 10, '2025-12-24 00:14:47', 1),
(31, '::1', 'adm@gmail.com', 10, '2025-12-24 00:26:53', 1),
(32, '::1', 'adm@gmail.com', 10, '2025-12-24 00:31:49', 1),
(33, '::1', 'adm@gmail.com', 10, '2025-12-24 00:35:18', 1),
(34, '::1', 'lit@gmail.com', 14, '2025-12-24 03:23:11', 1),
(35, '::1', 'lit@gmail.com', 14, '2025-12-24 07:25:24', 1),
(36, '::1', 'farhanuqolbi123@gmail.com', 15, '2025-12-24 21:51:37', 1),
(37, '::1', 'admin', NULL, '2025-12-25 19:10:48', 0),
(38, '::1', 'admin', NULL, '2025-12-25 19:13:24', 0),
(39, '::1', 'farhanuqolbi123@gmail.com', 15, '2025-12-25 19:25:22', 1),
(40, '::1', 'farhanuqolbi123@gmail.com', 15, '2025-12-25 19:28:04', 1),
(41, '::1', 'farhanuqolbi123@gmail.com', 15, '2025-12-25 19:31:15', 1),
(42, '::1', 'farhanuqolbi123@gmail.com', 15, '2025-12-25 19:43:22', 1),
(43, '::1', 'farhanuqolbi123@gmail.com', 15, '2025-12-25 19:44:39', 1),
(44, '::1', 'farhanuqolbi123@gmail.com', 15, '2025-12-25 19:44:59', 1),
(45, '::1', 'farhanuqolbi123@gmail.com', 15, '2025-12-25 19:46:42', 1),
(46, '::1', 'velidiwom@mailinator.com', 16, '2025-12-26 07:46:08', 1),
(47, '::1', 'admin@mail.com', NULL, '2025-12-26 07:58:18', 0),
(48, '::1', 'admin@mail.com', NULL, '2025-12-26 07:58:59', 0),
(49, '::1', 'admin@mail.com', NULL, '2025-12-26 07:59:32', 0),
(50, '::1', 'velidiwom@mailinator.com', NULL, '2025-12-26 08:05:04', 0),
(51, '::1', 'velidiwom@mailinator.com', 16, '2025-12-26 08:05:08', 1),
(52, '::1', 'admin@mail.com', NULL, '2025-12-26 08:05:23', 0),
(53, '::1', 'admin@mail.com', 18, '2025-12-26 08:05:52', 1),
(54, '::1', 'admin@mail.com', 18, '2025-12-26 08:09:00', 1),
(55, '::1', 'admin@mail.com', 18, '2025-12-26 08:09:52', 1),
(56, '::1', 'admin@mail.com', 18, '2025-12-26 08:11:56', 1),
(57, '::1', 'admin@mail.com', 18, '2025-12-26 08:13:57', 1),
(58, '::1', 'admin@mail.com', 18, '2025-12-26 08:14:40', 1),
(59, '::1', 'admin@mail.com', 18, '2025-12-26 08:18:40', 1),
(60, '::1', 'velidiwom@mailinator.com', 16, '2025-12-26 08:18:50', 1),
(61, '::1', 'admin@mail.com', 18, '2025-12-26 08:19:36', 1),
(62, '::1', 'admin@mail.com', 18, '2025-12-26 08:39:13', 1),
(63, '::1', 'velidiwom@mailinator.com', 16, '2025-12-26 08:39:25', 1),
(64, '::1', 'admin@mail.com', 18, '2025-12-26 09:02:00', 1),
(65, '::1', 'farhanuqolbi123@gmail.com', 15, '2025-12-26 09:04:40', 1),
(66, '::1', 'admin@mail.com', 18, '2025-12-27 06:50:14', 1),
(67, '::1', 'farhanuqolbi123@gmail.com', 15, '2025-12-27 07:22:30', 1),
(68, '::1', 'farhanuqolbi123@gmail.com', 15, '2025-12-27 07:23:31', 1),
(69, '::1', 'farhanuqolbi123@gmail.com', 15, '2025-12-27 07:32:09', 1),
(70, '::1', 'admin@mail.com', 18, '2025-12-27 07:34:52', 1),
(71, '::1', 'nicholjos@gmail.com', 19, '2025-12-27 09:50:21', 1),
(72, '::1', 'nicholjis@gmail.com', 20, '2025-12-27 09:52:58', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int UNSIGNED NOT NULL,
  `selector` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hashedValidator` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `icon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `slug`, `icon`, `created_at`) VALUES
(1, 'Camera', 'kamera', NULL, '2025-12-17 11:45:16'),
(2, 'Lighting', 'lighting', NULL, '2025-12-17 11:45:16'),
(3, 'Modifier', 'modifier', NULL, '2025-12-17 11:45:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `koleksi`
--

CREATE TABLE `koleksi` (
  `id_koleksi` int NOT NULL,
  `id_user` int NOT NULL,
  `id_produk` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `koleksi`
--

INSERT INTO `koleksi` (`id_koleksi`, `id_user`, `id_produk`, `created_at`, `updated_at`) VALUES
(23, 10, 2, '2025-12-23 17:54:03', NULL),
(25, 14, 6, '2025-12-24 05:09:20', NULL),
(26, 14, 4, '2025-12-24 05:40:18', NULL),
(27, 18, 7, '2025-12-26 01:10:11', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int NOT NULL,
  `nama_lokasi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_lokasi`, `slug`, `created_at`) VALUES
(1, 'Cilacap', 'cilacap', '2025-12-17 11:47:03'),
(2, 'Banyumas', 'banyumas', '2025-12-17 11:47:03'),
(3, 'Banjarnegara', 'banjarnegara', '2025-12-17 11:47:03'),
(4, 'Kebumen', 'kebumen', '2025-12-17 11:53:13'),
(5, 'Purbalingga', 'purbalingga', '2025-12-17 11:53:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1766212300, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int NOT NULL,
  `id_kategori` int NOT NULL,
  `id_lokasi` int NOT NULL,
  `id_sub_kategori` int DEFAULT NULL,
  `tipe` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_produk` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `spesifikasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `rating` decimal(2,1) DEFAULT '0.0',
  `ulasan` int DEFAULT '0',
  `harga_sewa` int NOT NULL,
  `stok` int NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_popular` tinyint(1) DEFAULT '0',
  `status` enum('aktif','nonaktif') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rating_avg` decimal(2,1) DEFAULT '0.0',
  `rating_count` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `id_lokasi`, `id_sub_kategori`, `tipe`, `nama_produk`, `deskripsi`, `spesifikasi`, `rating`, `ulasan`, `harga_sewa`, `stok`, `gambar`, `is_popular`, `status`, `created_at`, `rating_avg`, `rating_count`) VALUES
(1, 1, 1, 1, NULL, 'Canon EOS 90D', 'bismillah \r\najfjwjefguwigfiuwfwjdcbdjbcjdw', 'wjeefguiwefuhewf\r\nsjbdjcbjd\r\njdbcwc', 0.0, 0, 150000, 5, '1766117211_3f648310230ecebfd2fc.jpg', 1, 'aktif', '2025-12-17 11:47:17', 0.0, 0),
(2, 1, 2, 2, NULL, 'Sony A6400', 'Blabablalaba', 'akakbakssbkbkasd', 0.0, 0, 180000, 3, '1766110994_31b42899c2193c3c6fb6.png', 1, 'aktif', '2025-12-17 11:47:17', 0.0, 0),
(3, 2, 2, 4, NULL, 'Godox SK400II', '', '', 0.0, 0, 130000, 4, '1766546335_70181de353ce59a073f3.png', 1, 'aktif', '2025-12-17 11:47:17', 0.0, 0),
(4, 2, 3, 5, NULL, 'Godox TT685', '', '', 0.0, 0, 90000, 6, '1766546407_52da7b55589dabafecdd.png', 1, 'aktif', '2025-12-17 11:47:17', 0.0, 0),
(5, 3, 1, 7, NULL, 'Softbox Godox 60x90', '', '', 0.0, 0, 50000, 8, '1766546486_6423432a884f13664cf1.png', 1, 'aktif', '2025-12-17 11:47:17', 0.0, 0),
(6, 3, 2, 21, NULL, 'Umbrella White', '', '', 0.0, 0, 30000, 10, '1766546206_f5f3b283049900df4f88.jpg', 1, 'aktif', '2025-12-17 11:47:17', 0.0, 0),
(7, 1, 1, 2, NULL, 'Sony DFG333', 'gada', '', 0.0, 0, 150000, 1, '1766084712_f0830150497e350bc59b.png', 1, 'aktif', '2025-12-18 19:05:12', 0.0, 0),
(9, 1, 4, 2, NULL, 'FujiFilm X-A5', 'Kamera Fujifilm X-A5 sudah dilengkapi dengan lensa kit Fujifilm XC 15-45mm f3.5-5.6 yang cukup untuk kebutuhan sehari-hari. Secara tampilan, Fujifilm X-A5 memiliki desain retro dan klasik, dengan tambahan lapisan kulit di bagian depan. Benar-benar menyasar pasar generasi milenial yang kebanyakan pengguna pemula.\r\nLayar LCD-nya sudah touchscreen dan bisa diputar 180 derajat menghadap ke depan, sehingga cocok untuk vlogger. Para pembuat vlog semakin dimanjakan dengan fitur jack untuk mic external, sehingga bisa merekam suara dengan lebih jernih.\r\nKamera Fujifilm X-A5 cocok untuk penggunaan santai sehari-hari dan travelling. Bobotnya pun hanya 381 gram, jadi tidak membebani tas saat bepergian.', 'Kamera Fujifilm X-A5 sudah dilengkapi dengan lensa kit Fujifilm XC 15-45mm f3.5-5.6 yang cukup untuk kebutuhan sehari-hari. Secara tampilan, Fujifilm X-A5 memiliki desain retro dan klasik, dengan tambahan lapisan kulit di bagian depan. Benar-benar menyasar pasar generasi milenial yang kebanyakan pengguna pemula.\r\nLayar LCD-nya sudah touchscreen dan bisa diputar 180 derajat menghadap ke depan, sehingga cocok untuk vlogger. Para pembuat vlog semakin dimanjakan dengan fitur jack untuk mic external, sehingga bisa merekam suara dengan lebih jernih.\r\nKamera Fujifilm X-A5 cocok untuk penggunaan santai sehari-hari dan travelling. Bobotnya pun hanya 381 gram, jadi tidak membebani tas saat bepergian.', 0.0, 0, 190000, 2, '1766546683_188167e830a4472e2687.jpg', 1, 'aktif', '2025-12-24 03:24:43', 0.0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int NOT NULL,
  `id_user` int NOT NULL,
  `id_produk` int NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `durasi` int NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `total_harga` int DEFAULT NULL,
  `status` enum('pending','dipinjam','selesai','batal') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jumlah` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id_user`, `id_produk`, `tanggal_sewa`, `durasi`, `tanggal_kembali`, `total_harga`, `status`, `created_at`, `jumlah`) VALUES
(1, 2, 0, '2025-12-18', 1, '2025-12-19', NULL, 'selesai', '2025-12-18 16:09:27', 1),
(2, 2, 0, '2025-12-18', 1, '2025-12-19', NULL, 'selesai', '2025-12-18 16:10:10', 1),
(3, 2, 0, '2025-12-18', 3, '0000-00-00', NULL, 'selesai', '2025-12-18 16:16:58', 1),
(4, 2, 0, '2025-12-18', 3, '0000-00-00', 540000, 'selesai', '2025-12-18 16:34:50', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa_detail`
--

CREATE TABLE `sewa_detail` (
  `id_detail` int NOT NULL,
  `id_sewa` int NOT NULL,
  `id_produk` int NOT NULL,
  `qty` int DEFAULT '1',
  `harga` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id_sub_kategori` int NOT NULL,
  `id_kategori` int NOT NULL,
  `nama_sub_kategori` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sub_kategori`
--

INSERT INTO `sub_kategori` (`id_sub_kategori`, `id_kategori`, `nama_sub_kategori`, `slug`, `created_at`) VALUES
(1, 1, 'DSLR', 'dslr', '2025-12-17 11:46:10'),
(2, 1, 'Mirrorless', 'mirrorless', '2025-12-17 11:46:10'),
(3, 1, 'Analog', 'analog', '2025-12-17 11:46:10'),
(4, 2, 'Studio Flash', 'studio-flash', '2025-12-17 11:46:10'),
(5, 2, 'Speedlight', 'speedlight', '2025-12-17 11:46:10'),
(6, 2, 'Continuous Light', 'continuous-light', '2025-12-17 11:46:10'),
(7, 3, 'Softbox', 'softbox', '2025-12-17 11:46:10'),
(10, 2, 'Cross Light', NULL, '2025-12-22 11:09:44'),
(20, 3, 'Umbrella', NULL, '2025-12-23 17:05:23'),
(21, 3, 'Reflector', NULL, '2025-12-23 17:05:45'),
(22, 3, 'Ringflash', NULL, '2025-12-23 17:06:03'),
(23, 3, 'Snoot', NULL, '2025-12-23 17:06:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int NOT NULL,
  `id_produk` int NOT NULL,
  `id_user` int NOT NULL,
  `rating` tinyint NOT NULL,
  `komentar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `id_produk`, `id_user`, `rating`, `komentar`, `created_at`) VALUES
(1, 2, 14, 5, 'josmin', '2025-12-24 08:16:00'),
(2, 1, 14, 5, 'mantap', '2025-12-24 08:21:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `reset_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'adm@gmail.com', 'admin', '$2y$10$Zp5.5f47vket6at8Gl/BOOVl30UJZGj8cttXn.Mxz87skC0MasuWe', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2025-12-22 15:36:37', '2025-12-22 15:36:37', NULL),
(11, 'fifi@gmail.com', 'fifi', '$2y$10$Zodf7HCTnlz3IufhUrCnyudMl9Hpq2omTwkvSyBhZ/3U5qpaM6Ck6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2025-12-22 19:39:34', '2025-12-22 19:39:34', NULL),
(12, 'adminn@gmail.com', 'adm', '$2y$10$ct1it5pz8myMyzkTO1Mn5.WU8YjgLIy2XWWybCy1dxf494U6xuwKG', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2025-12-22 19:48:34', '2025-12-22 19:48:34', NULL),
(13, 'minul@gmail.com', 'minul', '$2y$10$UnuyUzPxXnleWIMT/9ppN.7u/BKWaS8XB3dM3z9mPjVjI5OsFhCP2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2025-12-23 18:50:05', '2025-12-23 18:50:05', NULL),
(14, 'lit@gmail.com', 'litapintar', '$2y$10$23WOt297gpHhhmk6NuDsO.OVuoHZji7ed8zvHVPlj3u77z7dYV.LS', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2025-12-24 03:22:55', '2025-12-24 03:22:55', NULL),
(15, 'farhanuqolbi123@gmail.com', 'farhanqalbii', '$2y$10$W8foMsdGSGRqeKTTCQq2Z.HINjaKcYFH0h8qXz9bgiKpvKmkduyC2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2025-12-24 21:51:17', '2025-12-27 07:32:09', NULL),
(16, 'velidiwom@mailinator.com', 'velidiwom', '$2y$10$OMJee4gG0akinh/CPiiLe.1aYpbRvo0YFwDzVEM1WoFD4wpfkhWZi', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2025-12-26 07:45:51', '2025-12-26 07:45:51', NULL),
(18, 'admin@mail.com', 'hayolo', '$2y$10$sBqH7KepkNMt8dN/X4ezUejSOcSxAyp.lXIvCZvVAQlIxTNTeBoxK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2025-12-27 07:34:52', NULL),
(19, 'nicholjos@gmail.com', 'farhannichol', '$2y$10$8eluu1nrHJ7up2THBzFZne2yVx1oif.Fu8TwlTa2eNrI2cRl31I1q', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2025-12-27 09:50:04', '2025-12-27 09:50:21', NULL),
(20, 'nicholjis@gmail.com', 'qolbinichol', '$2y$10$ZZ2H/BnxjRsiajkDZYts2exWz/4.VhoOGsTqf99jFKgdduMQKlqMq', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2025-12-27 09:52:44', '2025-12-27 09:52:58', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_backup`
--

CREATE TABLE `users_backup` (
  `id` int UNSIGNED NOT NULL DEFAULT '0',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `reset_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_old`
--

CREATE TABLE `user_old` (
  `id_user` int NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_old`
--

INSERT INTO `user_old` (`id_user`, `nama`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Admin Sturent', 'admin@sturent.com', '$2y$10$abcdefghijklmnopqrstuv', 'admin', '2025-12-13 12:27:27'),
(2, 'Majlista Aurellia Putri', 'jlistul@gmail.com', '$2y$10$gdCoSnlhhFYW/VFRQhAXmOqJrhin1zeC5LZ7sUu78DmdXNnxibdya', 'user', '2025-12-18 14:57:49');

--
-- Indeks untuk tabel yang dibuang
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `koleksi`
--
ALTER TABLE `koleksi`
  ADD PRIMARY KEY (`id_koleksi`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `fk_produk_kategori` (`id_kategori`),
  ADD KEY `fk_produk_lokasi` (`id_lokasi`);

--
-- Indeks untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `fk_sewa_user` (`id_user`),
  ADD KEY `idx_sewa_produk` (`id_produk`);

--
-- Indeks untuk tabel `sewa_detail`
--
ALTER TABLE `sewa_detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fk_detail_sewa` (`id_sewa`),
  ADD KEY `fk_detail_produk` (`id_produk`);

--
-- Indeks untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id_sub_kategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `user_old`
--
ALTER TABLE `user_old`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `koleksi`
--
ALTER TABLE `koleksi`
  MODIFY `id_koleksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sewa_detail`
--
ALTER TABLE `sewa_detail`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id_sub_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user_old`
--
ALTER TABLE `user_old`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_produk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_produk_lokasi` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `fk_sewa_user` FOREIGN KEY (`id_user`) REFERENCES `user_old` (`id_user`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sewa_detail`
--
ALTER TABLE `sewa_detail`
  ADD CONSTRAINT `fk_detail_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_detail_sewa` FOREIGN KEY (`id_sewa`) REFERENCES `sewa` (`id_sewa`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD CONSTRAINT `sub_kategori_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

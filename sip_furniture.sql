-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Apr 2020 pada 12.17
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sip_furniture`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2020_03_13_165826_create_user_table', 1),
(3, '2020_03_13_165949_create_category_table', 1),
(4, '2020_03_13_170244_create_product_table', 2),
(5, '2020_03_14_060115_add_stok_barang', 3),
(6, '2020_03_15_173216_add_photo_barang', 4),
(7, '2020_03_18_031632_add_last_login_users', 5),
(13, '2020_04_01_161808_create_detailorder_table', 6),
(14, '2020_04_01_161950_create_order_table', 6),
(15, '2020_04_06_192152_add_softdeletes_produk_kategori', 6),
(16, '2020_04_19_124339_add_admins', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detailorder`
--

CREATE TABLE `tbl_detailorder` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `jumlah_beli` bigint(20) NOT NULL,
  `subtotal` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_detailorder`
--

INSERT INTO `tbl_detailorder` (`id`, `nomor_pesanan`, `id_produk`, `jumlah_beli`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 'TRC400001', 3, 13, 65000000, '2020-04-15 09:13:32', '2020-04-15 09:13:32'),
(23, 'TRC400001', 4, 2, 600000, '2020-04-16 01:36:53', '2020-04-16 01:36:53'),
(30, 'TRC400001', 1, 2, 20000000, '2020-04-16 14:00:21', '2020-04-16 14:00:21');

--
-- Trigger `tbl_detailorder`
--
DELIMITER $$
CREATE TRIGGER `update_stok` AFTER INSERT ON `tbl_detailorder` FOR EACH ROW BEGIN 

            UPDATE tbl_produk SET stok=stok-NEW.jumlah_beli 
            WHERE id=NEW.id_produk;

            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','tidak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `nama_kategori`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Meja', 'aktif', NULL, '2020-03-15 02:29:07', NULL),
(3, 'Kursi', 'aktif', '2020-03-14 21:12:26', '2020-03-15 07:20:41', NULL),
(4, 'Lemari', 'aktif', '2020-03-14 23:27:23', '2020-03-14 23:27:23', NULL),
(5, 'Kasur', 'tidak', '2020-03-14 23:27:45', '2020-03-15 02:28:52', NULL),
(8, 'Kursi2', 'aktif', '2020-03-15 00:29:18', '2020-03-15 00:29:18', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `pembeli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `bayar` bigint(20) NOT NULL,
  `kembali` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` bigint(20) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','tidak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stok` bigint(20) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`id`, `id_kategori`, `nama_produk`, `harga`, `deskripsi`, `status`, `created_at`, `updated_at`, `stok`, `photo`, `deleted_at`) VALUES
(1, 8, 'Kursi Kayu Jati Berkualitas Diamond Gan COba Dulu', 10000000, 'Capek nulis', 'aktif', NULL, '2020-03-16 05:53:14', -205, 'public/hsTxcWaIYdzz1rAsqVWjLBvwUKyA3iRtG7SSZYSR.jpeg', NULL),
(3, 8, 'Kursi kayu jati 20', 5000000, 'Semoga Bisa Yallah 2', 'tidak', '2020-03-15 12:33:34', '2020-03-15 21:24:02', -474, 'public/OughNpE5lyt4ZRYC3qZZJEeS7xWbmED6cUWoQDMp.jpeg', NULL),
(4, 4, 'Lemari Dolphin', 300000, 'Lemari Lumba-lumba ini', 'aktif', '2020-03-30 03:03:28', '2020-03-30 03:03:28', -224, 'public/5GchUHROkB3BedIfvvzu2QrUrh4bsBv8eKJ3V7DB.jpeg', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `last_login_at`, `last_login_ip`) VALUES
(1, 'Achmad Arya', 'achmadarya@gmail.com', '2020-03-13 11:48:53', '$2y$10$wpg.BX5K9OB67B5Mb074tOZgudFKN2wtilghiEwk/eZo5e4io7UV.', 'RfEWiMj5gr07hUXZBCpFjaBI5wMOR4U7byXQbLUCn4CFbj3tPzRPNbyzFYt8', '2020-03-13 11:33:32', '2020-04-19 06:35:28', '2020-04-19 13:35:28', '127.0.0.1'),
(8, 'Coba Lagi', 'coba@gmail.com', NULL, '$2y$10$1PAT2kl8ONgVlr1lTnlZxOYLhhZAZ/YxT3CONPJJFvY6fSjRr7T.y', NULL, '2020-03-16 20:45:01', '2020-03-16 20:45:01', NULL, NULL),
(18, 'Bismillah', 'semangat@gmail.com', NULL, '$2y$10$nwHV9m0vtX3qNVKXDbSL4uXc47YCWCHdq2goBMadHjMEvUODi/c.O', NULL, '2020-03-17 07:21:20', '2020-03-17 07:21:20', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `tbl_detailorder`
--
ALTER TABLE `tbl_detailorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_detailorder_id_produk_foreign` (`id_produk`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_order_id_users_foreign` (`id_users`);

--
-- Indeks untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_produk_id_kategori_foreign` (`id_kategori`);

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
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_detailorder`
--
ALTER TABLE `tbl_detailorder`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_detailorder`
--
ALTER TABLE `tbl_detailorder`
  ADD CONSTRAINT `tbl_detailorder_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `tbl_produk` (`id`);

--
-- Ketidakleluasaan untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD CONSTRAINT `tbl_produk_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
